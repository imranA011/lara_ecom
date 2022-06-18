<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //SHOW CREATE SLIDER
    public function showAddSlider()
    {
        return view('admin.media.add-slider');
    }

    //SAVE CREATE SLIDER
    public function submitAddSlider()
    {
        request()->validate([
            'slider_name'        => 'required',
            'title'              => 'required|max:50',
            'sub_title'          => 'nullable|max:50',
            'description'        => 'nullable|max:255',
            'slider_btn'         => 'nullable|max:15',
            'slider_image'       => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $image = request()->file('slider_image');
        $new_image = rand() . '.' . $image->extension();

        Slider::create([
            'slider_name'              => request('slider_name'),
            'title'                    => request('title'),
            'sub_title'                => request('sub_title'),
            'description'              => request('description'),
            'slider_btn'               => request('slider_btn'),
            'slider_image'             => $new_image,
        ]);

        request('slider_image')->move('uploads/sliders',  $new_image);
        return redirect()->back()->with('create-message', 'Slider Added');
    }

    //SHOW ALL SLIDERS
    public function showSlider()
    {
        $sliders = Slider::all();
        return view('admin.media.show-sliders', compact('sliders'));
    }

    //SHOW UPDATE SLIDER
    public function showEditSlider($id)
    {
        $slider = Slider::find($id);
        return view('admin.media.edit-slider', compact(['slider']));
    }

    //SAVE UPDATE SLIDER
    public function submitEditSlider($id)
    {
        $slider = Slider::find($id);

        $old_slider = request('old_slider');
        $new_slider = request('slider_image');

        if($new_slider != null)
        {
            request()->validate([
                'slider_name'        => 'required',
                'title'              => 'required|max:50',
                'sub_title'          => 'nullable|max:50',
                'description'        => 'nullable|max:255',
                'slider_btn'         => 'nullable|max:15',
                'slider_image'       => 'required|image|mimes:jpg,png,jpeg',
            ]);
            $new_slider_name = rand(). '.' .  $new_slider->extension();
            request('slider_image')->move('uploads/sliders',  $new_slider_name);
            $file_path = 'uploads/sliders/'. $old_slider;
            unlink($file_path);
        }
        else
        {
            request()->validate([
                'slider_name'        => 'required',
                'title'              => 'required|max:50',
                'sub_title'          => 'nullable|max:50',
                'description'        => 'nullable|max:255',
                'slider_btn'         => 'nullable|max:15',
            ]);
            $new_slider_name = $old_slider;
        }

        $slider->update([
            'slider_name'              => request('slider_name'),
            'title'                    => request('title'),
            'sub_title'                => request('sub_title'),
            'description'              => request('description'),
            'slider_btn'               => request('slider_btn'),
            'slider_image'             => $new_slider_name,
        ]);
        return redirect()->route('slider.show')->with('update-message', 'Slider Updated');
    }

     //DELETE SLIDER
     public function deleteSlider($id)
     {
         $slider = Slider::find($id);
         $file_path = 'uploads/sliders/'. $slider->slider_image;
         unlink($file_path);
         $slider->delete();
         return redirect()->back()->with('delete-message', 'Slider deleted');
     }



    // UPDATE SlIDER STATUS
    public function updateSliderStatus($id, $status)
    {
        if($id != null && $status != null){

            $slider = Slider::find($id);

            if($slider != NULL){

                $slider->update([
                    'status' => $status,
                ]);
                return redirect()->back()->with('status-message', 'Slider successfully '. $status);

            }else{
                return 'No Slider Found';
            }

        }else{
            return 'Invalid Slider';
        }
    }


}
