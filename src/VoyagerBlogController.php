<?php
namespace UgurAkcil\VoyagerBlog;

use App\Http\Controllers\Controller;

use Request;
use UgurAkcil\VoyagerBooster\Facades\VoyagerCustom;

class VoyagerBlogController extends Controller
{
    protected $data;

	public function index()
	{
        $this->data['content'] = VoyagerCustom::test();
        return view('voyagerbooster::check', $this->data);
    }

	public function create()
	{
	}

	public function store()
	{
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function destroy($id)
	{
	}
}
