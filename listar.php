<?php

session_start();
if (!isset($_SESSION['id_usuario'])){
      header('Location:logout.php'); 
}

require_once 'config.php';

//----------------------------------------------------------------------------
//LISTA TODOS OS CLIENTES OU UM SÓ PELO ID
if (isset($_GET['id'])){
        $lista = Cliente::getClienteByID($_GET['id']);     
}
else {    
        $lista = Cliente::getList(); 
}
//----------------------------------------------------------------------------

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>

        <title>Lista de Clientes</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
   	    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
        
        <style type="text/css">
         body {
                /*background-color: #E0E0F8;*/
                 background-color: #F2F4F4;
              }
              /* a:link {
                color: black;
              }
              a:visited {
                color: black;
              }
              a:hover {
                color: black;
              }
              a:active {
                color: black;
              }*/
        
            .parent {display: block;position: relative;float: left;line-height: 30px;background-color: #4FA0D8;border-right:#CCC 1px solid;}
            .parent a{margin: 10px;color: #FFFFFF;text-decoration: none;}
            .parent:hover > ul {display:block;position:absolute;}
            .child {display: none;}
            .child li {background-color: #E4EFF7;line-height: 30px;border-bottom:#CCC 1px solid;border-right:#CCC 1px solid; width:95%;}
            .child li a{color: #000000;}
            ul{list-style: none;margin: 0;padding: 0px; min-width:10em;}
            ul ul ul{left: 100%;top: 0;margin-left:1px;}
            li:hover {background-color: #95B4CA;}
            .parent li:hover {background-color: #F0F0F0;}
            .expand{font-size:12px;float:right;margin-right:5px;}

       </style>

       <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
            } );
       </script>

       <script>
                  
            function confirmDelete() {
                    if(!confirm("Deseja mesmo excluir?")) {
                        return false;
                    }
                    this.form.submit();
            }
                  
            function confirmLogOut() {
                    if(!confirm("Deseja mesmo sair?")) {
                        return false;
                    }
                    this.form.submit();
            }
                   
        </script>

    </head>

<body>

<!-- <table  border="0" align="right">
    <tr>
      <td>
       <a href='signup.php'><img src="../dao/images/user.jpg" style="width:30px;height:31px;"></a>
      </td>
      <td>
        &nbsp;<a href='signup.php'><font color="black" size="3"><?php echo $_SESSION['email']?></a>
        &nbsp;&nbsp;
      </td>
   </tr>
 </table> -->
 <br>
 <table  border="0" align="right">
    <tr>
      <td><img src="../DAO/images/user.jpg" style="width:30px;height:31px;"></td>
      <td>
           <ul id="menu">
             <li class="parent"><a href="#"><?php echo $_SESSION['email']?></a>
              <ul class="child">
                <li><a onclick="return confirmLogOut();" href="logout.php">Log Out</a></li>
                <li><a href="signup.php">Alterar Senha</a></li>
              </ul>
            </li>
          </ul>
      </td>
    <td>&nbsp;&nbsp;&nbsp;</td>
   </tr>
 </table>

<div class="container">      
   <?php echo "<br>"?>
    <a href='index.php'><font color="blue">Add client</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href='#' id="notificar"><font color="blue">News</font></a>
    <script src="js/news.js"></script>
    &nbsp;&nbsp;&nbsp; 
    <a href='api_1.php'><font color="blue">API</font></a> &nbsp;&nbsp;&nbsp; 
    <a href='api_cep2.html'><font color="blue">CEP</font></a>


   <!--<a onclick="return confirmLogOut();" href='logout.php'><font color="blue">Log Out</font></a>-->
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <font color="black" size="5"><b>Clientes</b></font>
   <?php echo "<br><br>"?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th width="35%" class="th-sm">Nome</th>
      <th width="35%" class="th-sm">Endereço</th>
      <th width="17%" class="th-sm">Fone</th>
      <th width="13%" class="th-sm"></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($lista as $row) {?>
    <tr>
    	<td><input id="nome" name="nome" value="<?php echo $row['nome'];?>" type="hidden"><font color="black"><?php echo $row['nome'];?></font></a></td>
      <td><?php echo $row['end'];?></td>
      <td><?php echo $row['fone'];?>&nbsp;&nbsp;&nbsp;</td>
      <td>
          &nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?id=<?php echo $row['id'];?>"><font color="blue">Editar</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a onclick="return confirmDelete();" href="delete.php?id=<?php echo $row['id'];?>"><font color="blue">Excluir</font></a>
      </td>  
    </tr>
    <?php }?>
  </tbody>
</table>
   
   <!--TEST OF MODAL-->
   <div class="dp-i-stats">
      <span class="item mr-1">
        <button data-toggle="modal" data-target="#modaltrailer" class="btn btn-sm btn-trailer">
           Trailer
        </button>
      </span>
   </div>

  <div class="modal fade premodal premodal-trailer" id="modaltrailer" tabindex="-1" role="dialog"
         aria-labelledby="modaltrailertitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="iframe16x9">
                        <iframe width="560" height="315"
                                id="iframe-trailer" data-src="https://www.youtube.com/embed/RxAtuMu_ph4"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <!--END-TEST OF MODAL-->

</div>

</body>
</html>


