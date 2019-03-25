<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/api/autoload.php';
$chalet = new Chalet;
if(isset($_POST['chaletid'])){
  $chaletid = $_POST['chaletid'];
  $chalet->delete($chaletid);
  $response['status'] = 'success';
}
header('Content-type: application/json');
echo json_encode($response);

 ?>
