<?
$s="<table class='table' width='100%'>
<thead><th>UserId</th><th>Url</th><th>Controller</th><th>Method</th><th>Param1</th></thead>
</tbody>";
foreach($syslog->result() as $row){
$s.="<tr><td>$row->user_id</td><td>$row->url</td><td>$row->controller</td>
<td>$row->method</td><td>$row->param1</td></tr>";
}
$s.="</tbody></table>";
echo $s;

?>