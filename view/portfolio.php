<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Portfolio'));
?>

<form method="post" action="index.php?page=sell">"
<table class="table">
    <tr>
        <th>Symbol</th>
        <th>Shares</th>
        <th>Current Price</th>
        <th>Purchase Price</th>
    </tr>
<?php
foreach ($holdings as $holding)
{

    print "<tr class=\"info\">";
    print "<td>" . htmlspecialchars($holding["SYMBOL"]) . "</td>";
    print "<td>" . htmlspecialchars($holding["QTY"]) . "</td>";
    print "<td>US " . htmlspecialchars($holding["PRICE"]) . "$</td>";
    print "<td>US " . htmlspecialchars($holding["PP"]) . "$</td>";
    print "<td> <button type=\"submit\" class=\"btn btn-danger\" value=\" ".htmlspecialchars($holding["ID"])."\" name=\"transaction\">SELL!</button></td>";
    print "</tr>";
}
?>
</table>
</form>

<?php
render('footer');
?>
