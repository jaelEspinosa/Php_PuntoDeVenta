


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4>   
                        <?php \Config\Services::validation()->listErrors()?>                
                      

                        <form action="<?php echo base_url()?>productos/insertar" method="POST" autocomplete="off">
                        <?php csrf_field()?>

                        

                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="codigo" class="mb-2">Código</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código"  autofocus required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="nombre" class="mb-2">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  required >
                                </div>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                               
                               
                                <div class="col-12 col-sm-6">
                                    <label for="id_unidad" class="mb-2">Seleccione Unidad</label>
                                    <select class="form-select" id="id_unidad" name="id_unidad" required>
                                        <option class="text-gray" value="">--</option>
                                        <?php foreach($unidades as $unidad){?>
                                            <option value="<?php echo $unidad['id']?>"><?php echo $unidad['nombre']?></option>

                                         <?php }?>    
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="id_categoria" class="mb-2">Seleccione Categoria</label>
                                   
                                    <select class="form-select" id="id_categoria" name="id_categoria" required>
                                        <option value="">--</option>
                                        <?php foreach($categorias as $categoria){?>
                                            <option value="<?php echo $categoria['id']?>"><?php echo $categoria['nombre']?></option>

                                         <?php }?>    
                                    </select>
                                </div>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="precio_venta" class="mb-2">Precio de Venta</label>
                                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="precio de venta"  required >
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="precio_compra" class="mb-2">Precio de Compra</label>
                                    <input type="text" class="form-control" id="precio_compra" name="precio_compra" placeholder="precio de compra"  required >
                                </div>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                
                                <div class="col-12 col-sm-6">
                                    <label for="stock_minimo" class="mb-2">Stock mínimo</label>
                                    <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" placeholder="stock mínimo"  required >
                                </div>
                                <div class="col-12 col-sm-2">
                                    <label for="inventariable" class="mb-2">Invetariable</label>
                                    <select class="form-select" name="inventariable" id="inventariable">
                                       <option value="1">Si</option>
                                       <option value="0">No</option>
                                    </select>
                                </div>
                               
                            </div>
                        </div>
                       
                        <div class="mt-5 d-flex justify-content-start gap-5 ">
                            <a href="<?php echo base_url()?>productos" class="btn btn-sm btn-info">Regresar</a>
                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
                

                  
                </main>