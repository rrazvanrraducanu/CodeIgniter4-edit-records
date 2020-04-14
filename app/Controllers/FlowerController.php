<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\FlowerModel;
 
class FlowerController extends Controller
{
    public function index()
    {    
        $model = new FlowerModel();
        $data['flowers'] = $model->findAll();
        return view('flowers_view', $data);
    }   
    public function view($id=NULL){
        $model = new FlowerModel();
        $data['flower'] = $model->where('id', $id)->first();
 
     return view('single_flower_view', $data);
    }
    public function insert()
    {    
        return view('add_flower');
    }
 
    public function save()
    {  
 
        helper(['form', 'url']);
         
        $model = new FlowerModel();
 
        $data = [
            'nume' => $this->request->getVar('nume'),
            'culoare'  => $this->request->getVar('culoare'),
            'marime' => $this->request->getVar('marime'),
            'pret'  => $this->request->getVar('pret'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('public/index.php') );
    }
    public function edit($id = null)
    {
      
     $model = new FlowerModel();
     $data['flower'] = $model->where('id', $id)->first();
     return view('edit_view', $data);
    }
 
    public function update()
    {   
        helper(['form', 'url']);
        $model = new FlowerModel();
        $id = $this->request->getVar('id');
        $data = [
            'nume' => $this->request->getVar('nume'),
            'culoare'  => $this->request->getVar('culoare'),
            'marime' => $this->request->getVar('marime'),
            'pret'  => $this->request->getVar('pret'),
            ];
        $save = $model->update($id,$data);
        return redirect()->to( base_url('public/index.php/') );
    }
}
