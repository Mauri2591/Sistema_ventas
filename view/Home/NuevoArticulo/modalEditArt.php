<div class="container">
    <!-- The Modal -->
    <div class="modal" id="modal_edit_art">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <!-- Modal body -->
                <div class="modal-body" style="box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.4)">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">Editar Artículo n°: <span id="mostrar_id"></span></h3>
                    <form action="" method="post" id="form_editar_usuario" enctype="multipart/form-data">
                        <label for="ver_nom_prod"><strong>Nombre Artículo</strong></label>
                        <input type="text" class="form-control mb-2 mr-sm-4 col-4 bg-light" placeholder="Nombre Producto" id="ver_nom_prod" name="nom_prod">
                        <label for="ver_nom_prod"><strong>Marca Artículo</strong></label>
                        <input type="text" class="form-control mb-2 mr-sm-4 col-6 bg-light" placeholder="Marca Producto" id="ver_marca_prod" name="marca_prod">
                        <label for="ver_nom_prod"><strong>Descripción Artículo</strong></label>
                        <div class="container mt-2">
                            <textarea style="resize: none;" class="bg-light" id="ver_descrip_prod" cols="40" rows="5" name="descrip_prod"></textarea>
                        </div>
                        <img id="ver_img_art" height="60" width="60" alt="Imagen de articulo">
                        <input type="file" width="30" height="30" name="art_img" id="art_img" accept="image/jpej, image/png">
                        <div class="modal-footer">
                            <!-- <input type="reset" class="btn btn-warning" value="Limpiar" data-dismiss="modal"> -->
                            <input type="reset" class="btn btn-secondary" value="Limpiar">
                            <button type="submit" class="btn btn-success" data-dismiss="modal" onclick="editArt()">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../main.js"></script>