<?php

namespace App\Http\Controllers;
use App\BlogUser;
use App\articles;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class BlogUserController extends Controller
{

    public function index()
    {
        $articledata = articles::paginate(6);
        return view('index')->with('articledata',$articledata);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function RegisterUser(Request $request)
    {
        $result = BlogUser::where('email',$request->email)->first();
        if(!$result)
        {
        BlogUser::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        Session::flash('message', 'User Register successfully.');
        return redirect()->back();
        }
        else
        {
            Session::flash('msg', 'email already exist.');
        return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LoginUser(Request $request)
    {
        $result = BlogUser::where('email',$request->email)->first();
        if(!empty($result))
        {

                if (\Hash::check($request->password, $result->password) == false)
                {
                    Session::flash('message', 'Invalid Password.');
                    return redirect()->back();
                }
                else
                {
                    Session::put('UserId', $result->userid);
                    return redirect('/myarticles');
                }
        }
        else
        {
            Session::flash('message', 'Invalid Email.');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function myarticles()
    {
        $data = articles::where('userid',Session::get('UserId'))->get();
        return view('myarticles')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogUser  $blogUser
     * @return \Illuminate\Http\Response
     */
    public function UploadArticle(Request $request)
    {
          $image = $request->file('articleimg');
          if ($image) {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
          }


          articles::insert([
            'userid'=>Session::get('UserId'),
            'title'=>$request->title,
            'articleimage'=>$image_name,
            'description'=>$request->content
          ]);

          return back()->with('success','Article addedd successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogUser  $blogUser
     * @return \Illuminate\Http\Response
     */
    public function UpdateUploadArticle(Request $request)
    {
       // return $request->all();
        $image = $request->file('articleimg');
        if ($request->hasFile('articleimg')) {
          $image_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('images'), $image_name);

          articles::where('articleid',$request->articalid)->update([
            'userid'=>Session::get('UserId'),
            'title'=>$request->title,
            'articleimage'=>$image_name,
            'description'=>$request->content
          ]);

        }
        else
        {
            articles::where('articleid',$request->articalid)->update([
                'userid'=>Session::get('UserId'),
                'title'=>$request->title,
                'description'=>$request->contentnew
              ]);
        }

        return back()->with('success','Article updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogUser  $blogUser
     * @return \Illuminate\Http\Response
     */
    public function RemoveArticle($id)
    {
        articles::where('articleid',$id)->delete();
        return back()->with('success','Article remove successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogUser  $blogUser
     * @return \Illuminate\Http\Response
     */
    public function Logout()
    {
        Session::flush();
        Cache::flush();
        return redirect('/');
    }

    public function getdetailarticle($id)
    {
        $vr = articles::where('articleid',$id)->first();
        return view('articlebrif')->with('vr',$vr);
    }
}
