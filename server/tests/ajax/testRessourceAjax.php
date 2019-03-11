<?php
require_once '../../manager/messageManager.php';

$idUserSent = $_GET["idUserSent"];
$idUserReceived = $_GET["idUserReceived"];
$conversation = MessageManager::GetConversation($idUserSent, $idUserReceived);
header('Content-type: application/json');   
?>

<?php
//{
//"PrenomEleve": "<?php echo $conversation[0]["message"];
ini_set('display_errors', 1);

$temp = array(
    'conversation' => array()
);
$collect = array();
foreach ($conversation as $key => $value)
{
    $collect[$value["idUserSent"]] = array(
        'message' => $value["message"],
        'key' => $key
    );
}
$temp["conversation"]=$collect;
echo json_encode($temp);






