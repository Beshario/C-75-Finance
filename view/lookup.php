<?php
require_once('../includes/helper.php');?>

<form class="form-inline" action="index.php?page=lookup" method="post">
  <div class="form-group">
    <label for="exampleInputName2">Name</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="GOOG" name="param">
  </div>
  <button type="submit" class="btn btn-default">Look Up</button>
</form>

<?php 
if (!isset($quote_data["symbol"]))
{
    // No quote data
    render('header', array('title' => 'Quote')); ?>
<div class="alert alert-warning"><strong>Warning!</strong> No symbol was provided, or no quote data was found.</div>
<?
}
else
{
    // Render quote for provided quote data
    render('header', array('title' => 'Quote for '.htmlspecialchars($quote_data["symbol"])));
?>

<form class="form" action="index.php?page=buy" method="post">
    <table class="table">
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Last Traded at</th>
            <th>Quantity to buy</th>
        </tr>
        <tr  class="info">
            <td><?= htmlspecialchars($quote_data["symbol"]) ?></td>
            <td><?= htmlspecialchars($quote_data["name"]) ?></td>
            <td><?= htmlspecialchars($quote_data["last_trade"]) ?></td>
            <td><input name="qty" type="number" max="1000" min="1"></input></td>
        </tr>
    </table>
    <input type="hidden" name="pp" value="<?= htmlspecialchars($quote_data["last_trade"]);?>">
    <input type="hidden" name="param" value="<?= htmlspecialchars($quote_data["symbol"]); ?>">
    <button type="submit" class="btn btn-success"><b>BUY</b></button>
</form>

<?php
}

render('footer');
?>
