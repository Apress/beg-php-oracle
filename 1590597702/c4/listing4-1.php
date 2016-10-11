<?php

function amortizationTable($pNum, $periodicPayment, $balance, $monthlyInterest)
{
// Calculate payment interest
$paymentInterest = round($balance * $monthlyInterest, 2);
// Calculate payment principal
$paymentPrincipal = round($periodicPayment - $paymentInterest, 2);
// Deduct principal from remaining balance
$newBalance = round($balance - $paymentPrincipal, 2);
// If new balance < monthly payment, set to zero
if ($newBalance < $paymentPrincipal) {
$newBalance = 0;
}
printf("<tr><td>%d</td>", $pNum);
printf("<td>$%s</td>", number_format($newBalance, 2));
printf("<td>$%s</td>", number_format($periodicPayment, 2));
printf("<td>$%s</td>", number_format($paymentPrincipal, 2));
printf("<td>$%s</td></tr>", number_format($paymentInterest, 2));
# If balance not yet zero, recursively call amortizationTable()
if ($newBalance > 0) {
$pNum++;
amortizationTable($pNum, $periodicPayment,
$newBalance, $monthlyInterest);
} else {
return 0;
}
}

?>

