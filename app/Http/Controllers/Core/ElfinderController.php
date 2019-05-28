<?php namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Groups;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 
use Auth;

class ElfinderController extends Controller {

	public function __construct()
	{
        $this->middleware(function ($request, $next) {  
        $user = Auth::user();         
            if($user->group_id != Groups::SUPER_ADMIN)
                return redirect('dashboard')
                ->with('messagetext','You Dont Have Access to Page !')->with('msgstatus','error');            
            return $next($request);
        });		
	}	

	public function getIndex( Request $request )
	{

		
		$data = array('pageTitle' =>'FileManager' , 'pageNote'=>'Manage My Files' );
		//return public_path().'/uploads/userfiles/';
		if(!is_dir(public_path().'/uploads/userfiles/')) mkdir(public_path().'/uploads/userfiles/',0777);
		$user = Auth::user();
		if($user->group_id == Groups::SUPER_ADMIN or $user->group_id == Groups::ADMINISTRATOR ) 
		{
			$data['folder'] = 'uploads/'; 
		} else {
			$folder = \Session::get('uid');
			if(!is_dir('./uploads/userfiles/'.$folder )) mkdir('./uploads/userfiles/'.$folder ,0777);
			$data['folder'] = 'uploads/userfiles/'.$folder ; 
			
		}
		if(!is_null($request->get('cmd')))
		{
			return view('core.elfinder.connector',$data);

		} else {
			return view('core.elfinder.filemanager',$data);
		}
	
	}
	
	static function display()
	{
		return view('core.elfinder.filemanager');	
	} 
	
	
}