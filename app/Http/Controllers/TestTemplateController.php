<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\TemplateServices;
use App\Models\TestTemplate;
use Validator;

class TestTemplateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * list added test templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $templateService     = new TemplateServices;
        $result['templates'] = $templateService->getTestTemplates();
        return view('test_templates.list',$result);
    }
    
    /**
     * test template add form display.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTestTemplate(Request $request)
    {
        return view('test_templates.add');
    }
    /**
     * test template save form details.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveTestTemplate(Request $request)
    {
        $messages = [
            'test_temp_name.required'  => 'The template name field is required.',
            'test_temp_image.required' => 'The template image field is required.',
            'test_temp_image.mimes'    => 'The template image must be a file of type: .svg',
        ];
        if($request->test_temp_id!='')
        {
            $rules = [
                'test_temp_name'  => 'required',
                'test_temp_image' => 'mimes:svg'
            ];
           
            $validator = Validator::make($request->all(),$rules ,$messages);
            if ($validator->fails()) 
            {
                return redirect('test-template/edit/'.$request->test_temp_id)
                            ->withErrors($validator)
                            ->withInput();
            }
        }
        else
        {
            $rules = [
                'test_temp_name'  => 'required',
                'test_temp_image' => 'required|mimes:svg'
            ];
            $validator = Validator::make($request->all(),$rules ,$messages);
            if ($validator->fails()) 
            {
                return redirect('test-template/add')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
        
        $templateService     = new TemplateServices;
        $templateService->saveTestTemplate($request);
        return redirect('test-area');
    }
    
    /**
     * test template add form display.
     *
     * @return \Illuminate\Http\Response
     */
    public function editTestTemplate($id,Request $request)
    {
        $templateService     = new TemplateServices;
        $details['template'] = $templateService->getTestTemplateDetails($id);
        return view('test_templates.edit',$details);
    }
    
    /**
     * test template add form display.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteTestTemplate($id,Request $request)
    {
        $test_temp = TestTemplate::find($id);
        if(count($test_temp)>0)
        {
            //remove existing video
            unlink(public_path($test_temp->image_url));
            $details['template'] = TestTemplate::where('temp_id',$id)->delete();
             \Session::flash('flash_message','Template deleted successful');
        }
        return redirect('test-area');
    }
}
