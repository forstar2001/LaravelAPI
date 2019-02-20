<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TestTemplate;
use App\Models\Template;
use Imagick;
class TemplateServices
{
    /*
     * Get main categories
     */
	public function getCategories()
    {
       return Category::get();
    }
    /*
     * Get main categories
     */
	public function getTestTemplates()
    {
       return TestTemplate::orderBy('created_at','DESC')->get();
    }
    /*
     * Get main categories
     */
	public function saveTestTemplate($request)
    {
        if($request->test_temp_id!='')
        {
            $test_temp            = TestTemplate::find($request->test_temp_id);
            $test_temp->temp_name = $request->test_temp_name;
            if($request->hasFile('test_temp_image'))
            {
                //remove existing video
                // unlink(public_path('images/test_templates/'.$test_temp->image_name));
                $temp_img             = $request->file('test_temp_image');
                $file                 = md5(time());
                $file_svg                 = $file.'.svg';
                $file_png                 = $file.'.png';
                $temp_img->move(public_path('images/test_templates'),$file_svg);
                $test_temp->image_name    = $file_png;
                $test_temp->image_url     ='images/test_templates/' . $file_svg;
                $test_temp->image_png_url = 'images/test_templates/' . $file_png;
                $test_temp->thumb_image   = 'images/test_templates/thumb/' . $file_png;

                $image = new Imagick();
                setBackgroundColor(new ImagickPixel('transparent'));
                $image->readImageBlob(file_get_contents('images/test_templates/' . $file_svg));
                $image->setImageFormat("png24");
                $image->resizeImage(2000, 2000, imagick::FILTER_LANCZOS, 1); 
                $image->writeImage('images/test_templates/'.$file_png);

                $image_thumb = new Imagick();
                $image_thumb->readImageBlob(file_get_contents('images/test_templates/' . $file_svg));
                $image_thumb->setImageFormat("png24");
                $image_thumb->resizeImage(200, 200, imagick::FILTER_LANCZOS, 1); 
                $image_thumb->writeImage('images/test_templates/thumb/'.$file_png);
            }

            $test_temp->save();
            \Session::flash('flash_message','Template edited successful');
        }
        else
        {
            $test_temp                = new TestTemplate;
            $test_temp->temp_name     = $request->test_temp_name;
            $temp_img                 = $request->file('test_temp_image');
            $file                     = md5(time());
            $file_svg                 = $file.'.svg';
            $file_png                 = $file.'.png';
            $temp_img->move(public_path('images/test_templates'),$file_svg);
            $test_temp->image_name    = $file_png;
            $test_temp->image_url     = 'images/test_templates/' . $file_svg;
            $test_temp->image_png_url = 'images/test_templates/' . $file_png;
            $test_temp->thumb_image   = 'images/test_templates/thumb/' . $file_png;
            $test_temp->save();

            $image = new Imagick();
            $image->readImageBlob(file_get_contents('images/test_templates/' . $file_svg));
            $image->setImageFormat("png24");
            $image->resizeImage(2000, 2000, imagick::FILTER_LANCZOS, 1); 
            $image->writeImage('images/test_templates/'.$file_png);

            $image_thumb = new Imagick();
            $image_thumb->readImageBlob(file_get_contents('images/test_templates/' . $file_svg));
            $image_thumb->setImageFormat("png24");
            $image_thumb->resizeImage(200, 200, imagick::FILTER_LANCZOS, 1); 
            $image_thumb->writeImage('images/test_templates/thumb/'.$file_png);

            \Session::flash('flash_message','Template added successful');
        }
        return 1;
    }
    /*
     * Get main categories
     */
	public function saveTemplate($request)
    {
        //check form edit
        if($request->temp_id!='')
        {
            $test_temp                = Template::find($request->temp_id);
            $test_temp->template_name = $request->name;
            $test_temp->category_id   = $request->category;
            $test_temp->sub_only      = $request->sub_only;
            if($request->hasFile('image'))
            {
                if($test_temp->image_url!='')
                {
                    //remove existing video
                    // unlink(public_path('images/templates/'.$test_temp->image_name));
                }
                $temp_img              = $request->file('image');
                $file                  = md5(time());
                $file_svg                  = $file. '.svg';
                $file_png                  = $file. '.png';
                $temp_img->move(public_path('images/templates'),$file_svg);
                $test_temp->image_name     = $file_png;
                $test_temp->image_url      ='images/templates/' . $file_svg;
                $test_temp->image_png_url  ='images/templates/' . $file_png;
                $test_temp->thumb_image    ='images/templates/thumb/' . $file_png;

                $image = new Imagick();
                $image->readImageBlob(file_get_contents('images/templates/' . $file_svg));
                $image->setImageFormat("png24");
                $image->resizeImage(2000, 2000, imagick::FILTER_LANCZOS, 1); 
                $image->writeImage('images/templates/'.$file_png);

                $image_thumb = new Imagick();
                $image_thumb->readImageBlob(file_get_contents('images/templates/' . $file_svg));
                $image_thumb->setImageFormat("png24");
                $image_thumb->resizeImage(200, 200, imagick::FILTER_LANCZOS, 1); 
                $image_thumb->writeImage('images/templates/thumb/'.$file_png);
            }
            $test_temp->save();
            \Session::flash('flash_message','Template edited successful');
        }
        else//new template
        {
            $temp                   = new Template;
            $temp->template_name    = $request->name;
            $temp->category_id      = $request->category;
            $temp->sub_only         = $request->sub_only;
            $img                    = $request->file('image');
            $file                   = md5(time());
            $file_svg               = $file. '.svg';
            $file_png               = $file. '.png';
            $img->move(public_path('images/templates'),$file_svg);
            $temp->image_name       = $file_png;
            $temp->image_url        = 'images/templates/' . $file_svg;
            $temp->image_png_url    = 'images/templates/' . $file_png;
            $temp->thumb_image   	= 'images/templates/thumb/' . $file_png;
            $temp->save();

            $image = new Imagick();
            $image->readImageBlob(file_get_contents('images/templates/' . $file_svg));
            $image->setImageFormat("png24");
            $image->resizeImage(2000, 2000, imagick::FILTER_LANCZOS, 1); 
            $image->writeImage('images/templates/'.$file_png);

            $image_thumb = new Imagick();
            $image_thumb->readImageBlob(file_get_contents('images/templates/' . $file_svg));
            $image_thumb->setImageFormat("png24");
            $image_thumb->resizeImage(200, 200, imagick::FILTER_LANCZOS, 1); 
            $image_thumb->writeImage('images/templates/thumb/'.$file_png);

            \Session::flash('flash_message','Template added successful');
        }
        return 1;
    }
    /*
     * get all templates
     */
    public function getTemplates($cat_id) 
    {
        return Template::where('category_id',$cat_id)->get();
    }
    /*
     * get selected test template details
     */
    public function getTestTemplateDetails($id) 
    {
        return TestTemplate::find($id);
    }
    /*
     * get selected test template details
     */
    public function getTemplateDetails($id) 
    {
        return Template::find($id);
    }
}
