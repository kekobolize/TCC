<?php
	include_once('../functions/util.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Máterias</title>
        <link href="/saladeaula/css/material_icons.css" rel="stylesheet">
        <link href="/saladeaula/css/style.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    	<!-- Modal de Inativação -->
    	<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Inativar Máterias?</h4>
				<p>Deseja realmente <span id="status">Teste</span> a matéria <span id="nome_modal">Teste</span>? Você poderá reativá-la se necessário!</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-red btn-flat">Não</a>
				<a href="#!" id="href_modal" class="modal-close waves-effect waves-green btn-flat">Sim</a>
			</div>
		</div>
        <div class="content row">

			<?php
				include_once('../components/menu.php');
			?>

        	
							<div class="item_box col s12 m10 offset-m1">
								<div class="item_content">
									<div class="item_top col s12 center center-align">
										<h3>Máterias | Funções</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
										<table>
											<thead>
												<tr>
													<th><a class="btn-floating waves-effect waves-light btn-small" href="cadastro_materia.php"><i class="material-icons right">add</i>cadastrar</a></th>
													<th>Cor</th>
													<th>Nome</th>
													<th>Descrição</th>
													<th>Status</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												<?php

													include_once('../functions/exibir_materia.php');
                                                    $materias = exibir_materia(1);
                                                    
                                                    if(!empty($materias)){
                                                        while($materia = $materias->fetch_object()){

                                                            if($materia->st_materia == 0){
                                                                $materia->st_materia = "Inativo";
                                                                $icon = "check";
                                                                $action = "ativar";
                                                            }else{
                                                                $materia->st_materia = "Ativo";
                                                                $icon = "delete";
                                                                $action = "inativar";
                                                            }
                                        
                                                            $cd = $materia->cd_materia;
                                                            $nome = $materia->nm_materia;
                                                            $desc = $materia->ds_materia;

                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><input type="color" value="<?php echo $materia->tx_cor; ?>" disabled style="height:3rem; outline:none; background-color:transparent; border:none;"></td>
                                                                <td><?php echo $materia->nm_materia; ?></td>
                                                                <td><?php echo $materia->ds_materia; ?></td>
                                                                <td><?php echo $materia->st_materia; ?></td>
                                                                <td><a class='btn-floating btn waves-effect waves-light' href='editar_materia.php?cd=<?php echo $materia->cd_materia?>'><i class='material-icons tiny'>create</i></a></td>
                                                                <td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
														
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					

        <!--Scripts-->
        <script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="/saladeaula/js/materialize.js"></script>
        <script type="text/javascript">
    	 	$(document).ready(function(){
		    	$(".sidenav").sidenav();
		    	$('.dropdown-trigger').dropdown();
		    	$('.modal').modal();
		  	});
    	 	function muda_modal(nome,cd,status){
    	 		document.getElementById('nome_modal').innerHTML = nome;
    	 		document.getElementById('status').innerHTML = status;
    	 		document.getElementById('href_modal').href = "../actions/inativar_materia.php?cd="+cd;
    	 	}
        </script>
    </body>
</html>
