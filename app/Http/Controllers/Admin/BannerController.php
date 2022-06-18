<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //SHOW CREATE BANNER
    public function showAddBanner()
    {
        return view('admin.media.add-banner');
    }

    //SAVE CREATE BANNER
    public function submitAddBanner()
    {
        request()->validate([
            'banner_name'        => 'required',
            'banner_type'        => 'required',
            'title'              => 'nullable|max:30',
            'sub_title'          => 'nullable|max:50',
            'banner_image'       => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $image = request()->file('banner_image');
        $new_image = rand() . '.' . $image->extension();

        Banner::create([
            'banner_name'              => request('banner_name'),
            'banner_type'              => request('banner_type'),
            'title'                    => request('title'),
            'sub_title'                => request('sub_title'),
            'banner_image'             => $new_image,
        ]);

        request('banner_image')->move('uploads/banners',  $new_image);
        return redirect()->back()->with('create-message', 'Banner Added');
    }

    //SHOW ALL BANNERS
    public function showBanner()
    {
        $banners = Banner::all();
        return view('admin.media.show-banners', compact('banners'));
    }

    //SHOW UPDATE BANNER
    public function showEditBanner($id)
    {
        $banner = Banner::find($id);
        return view('admin.media.edit-banner', compact(['banner']));
    }

    //SAVE UPDATE BANNER
    public function submitEditBanner($id)
    {
        $banner = Banner::find($id);

        $old_banner = request('old_banner');
        $new_banner = request('banner_image');

        if($new_banner != null)
        {
            request()->validate([
                'banner_name'        => 'required',
                'banner_type'        => 'required',
                'title'              => 'nullable|max:30',
                'sub_title'          => 'nullable|max:50',
                'banner_image'       => 'required|image|mimes:jpg,png,jpeg',
            ]);
            $new_banner_name = rand(). '.' .  $new_banner->extension();
            request('banner_image')->move('uploads/banners',  $new_banner_name);
            $file_path = 'uploads/banners/'. $old_banner;
            unlink($file_path);
        }
        else
        {
            request()->validate([
                'banner_name'        => 'required',
                'banner_type'        => 'required',
                'title'              => 'nullable|max:50',
                'sub_title'          => 'nullable|max:50',
            ]);
            $new_banner_name = $old_banner;
        }

        $banner->update([
            'banner_name'              => request('banner_name'),
            'banner_type'              => request('banner_type'),
            'title'                    => request('title'),
            'sub_title'                => request('sub_title'),
            'banner_image'             => $new_banner_name,
        ]);
        return redirect()->route('banner.show')->with('update-message', 'Banner Updated');
    }

     //DELETE BANNER
     public function deleteBanner($id)
     {
         $banner = Banner::find($id);
         $file_path = 'uploads/banners/'. $banner->banner_image;
         unlink($file_path);
         $banner->delete();
         return redirect()->back()->with('delete-message', 'Banner deleted');
     }



    // UPDATE BANNER STATUS
    public function updateBannerStatus($id, $status)
    {
        if($id != null && $status != null){

            $banner = Banner::find($id);

            if($banner != NULL){

                $banner->update([
                    'status' => $status,
                ]);
                return redirect()->back()->with('status-message', 'Banner successfully '. $status);

            }else{
                return 'No Banner Found';
            }

        }else{
            return 'Invalid Banner';
        }
    }


}

