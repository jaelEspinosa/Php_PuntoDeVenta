<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use App\Models\CategoriasModel;
 use App\Models\ProductosModel;
 use App\Models\UnidadesModel;

 class Productos extends BaseController 
 
 {
    protected $productos;
    protected $unidades;
    protected $categorias;



    public function __construct()

    {        
       $this->productos = new ProductosModel();
       $this->unidades = new UnidadesModel();
       $this->categorias = new CategoriasModel();

    }

    public function getIndex($activo = 1 )
    {
        $productos = $this->productos->where('activo',$activo)->findAll();
        
        $data = ['titulo' => 'Productos', 'datos'=>$productos];

        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');
    }
    
    public function getNuevo(){
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $unidades = $this->unidades->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');

    }

    public function postInsertar()
    
    {
      if($this->request->getMethod() == 'post' && $this->validate(['nombre' => 'required'])){
        
        $this->productos->save(['codigo' => $this->request->getpost('codigo'),
                                'nombre' => $this->request->getpost('nombre'),
                                'id_unidad' => $this->request->getpost('id_unidad'),
                                'id_categoria' => $this->request->getpost('id_categoria'),
                                'precio_venta' => $this->request->getpost('precio_venta'),
                                'precio_compra' => $this->request->getpost('precio_compra'),
                                'stock_minimo' => $this->request->getpost('stock_minimo'),
                                'inventariable' => $this->request->getpost('inventariable'),
                              
                              ]);
        return redirect()->to(base_url().'productos');

      } else {

        $data = ['titulo' => 'Agregar Unidad', 'validation' => $this->validator];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');


      }
    }


    public function getEditar($id){

      $categorias = $this->categorias->where('activo', 1)->findAll();
      $unidades = $this->unidades->where('activo', 1)->findAll();

        $producto = $this->productos->where('id', $id)->first();
        $data = ['titulo' => 'Editar Producto', 'datos' => $producto, 'categorias' => $categorias, 'unidades'=>$unidades ];

        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');

    }

    public function postActualizar()    
         {
              $this->productos->update($this->request->getPost('id'),[
                                              'codigo' => $this->request->getpost('codigo'),
                                              'nombre' => $this->request->getpost('nombre'),
                                              'id_unidad' => $this->request->getpost('id_unidad'),
                                              'id_categoria' => $this->request->getpost('id_categoria'),
                                              'precio_venta' => $this->request->getpost('precio_venta'),
                                              'precio_compra' => $this->request->getpost('precio_compra'),
                                              'stock_minimo' => $this->request->getpost('stock_minimo'),
                                              'inventariable' => $this->request->getpost('inventariable'),
            ]);
              return redirect()->to(base_url().'productos');
         }

   
   
         public function getEliminar($id){

    $this->productos->update($id,['activo' => 0]);
      return redirect()->to(base_url().'productos');
   }

   public function getRestaurar($id){

    $this->productos->update($id,['activo' => 1]);
      return redirect()->to(base_url().'productos');
   }


   public function getEliminados($activo = 0)
   {
       $productos = $this->productos->where('activo',$activo)->findAll();
       $data = ['titulo' => 'Productos Eliminados', 'datos'=>$productos];

       echo view('header');
       echo view('productos/eliminados', $data);
       echo view('footer');
   }
 
}
