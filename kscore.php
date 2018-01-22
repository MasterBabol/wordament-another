<?php

$data = array('totalsum'=>0, 'totalgames'=>0, 'best'=>0);

$ifp = fopen("kscore.dat", "r");
if ($ifp)
{
	$user_score = $_GET['score'];
	$readstr = fgets($ifp);
	fclose($ifp);
	$data = unserialize($readstr);
	$data['totalsum'] += $user_score;
	$data['totalgames'] += 1;
	if ($user_score > $data['best'])
		$data['best'] = $user_score;
}

$writestr = serialize($data);
$ofp = fopen("score.dat", "w");
if ($ofp)
{
	fputs($ofp, $writestr);
	fclose($ofp);
}
echo json_encode($data);

?>
