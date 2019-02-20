<?php



namespace App\Http\Controllers;



use App\Http\Requests;

use Illuminate\Http\Request;

use App\Models\User;

use App\Services\TemplateServices;

use Validator;



class TemplateController extends Controller

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

     * list templates

     *

     * @return 

    */

    public function index(Request $request) {

        $templateService = new TemplateServices;
        $categories      = $templateService->getCategories();

        $templates       = [];

        if(isset($_GET['id'])&&$_GET['id']!='')//check category id isset

        {

            $cat_id = $_GET['id'];

            $templates =$templateService->getTemplates($cat_id);

        }

        else

        {

            if(count($categories)>0)//check categories exit

            {

                $cat_id = $categories[0]->category_id;

                $templates =$templateService->getTemplates($cat_id);

            }

        }

        $result['categories'] = $categories;

        $result['cat_id']     = $cat_id;

        $result['templates']  = $templates;

        return view('templates.list',$result);

    }

    

    /*

     * display add templates from

     */

    public function addTemplate(Request $request) {

        $templateService      = new TemplateServices;

        $result['categories'] = $templateService->getCategories();

        return view('templates.add',$result);

    }

    

    /*

     * save templates details

     */

    public function saveTemplate(Request $request) {

        $messages = [

            'name.required'  => 'The template name field is required.',

            'image.required' => 'The template image field is required.',

            'image.mimes'    => 'The template image must be a file of type: .svg',

        ];

        if($request->temp_id!='')

        {

            $rules = [

                'name'  => 'required',

                'image' => 'mimes:svg'

            ];

            $validator = Validator::make($request->all(),$rules,$messages );

            if ($validator->fails()) 

            {

                return redirect('template/edit/'.$request->temp_id)

                            ->withErrors($validator)

                            ->withInput();

            }

        }

        else

        {

            $rules = [

                'name'  => 'required',

                'image' => 'required|mimes:svg'

            ];

            $validator = Validator::make($request->all(),$rules ,$messages);

            if ($validator->fails()) 

            {

                return redirect('template/add/')

                            ->withErrors($validator)

                            ->withInput();

            }

        }

        

        $templateService = new TemplateServices;

        $templateService->saveTemplate($request);

        return redirect('templates/list?id='.$request->category);

        

    }

    

    /*

     * display edit templates from

     */

    public function editTemplate($id,Request $request) {

        

        $templateService      = new TemplateServices;

        $result['template']   = $templateService->getTemplateDetails($id);

        $result['categories'] = $templateService->getCategories();

        return view('templates.edit',$result);

    }
    

}

