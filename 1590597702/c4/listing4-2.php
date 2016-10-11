<?php
// Loan balance
$balance = 10000.00;
// Loan interest rate
$interestRate = .0575;

// Monthly interest rate
$monthlyInterest = $interestRate / 12;
// Term length of the loan, in years.
$termLength = 5;
// Number of payments per year.
$paymentsPerYear = 12;
// Payment iteration
$paymentNumber = 1;
// Determine total number payments
$totalPayments = $termLength * $paymentsPerYear;
// Determine interest component of periodic payment
$intCalc = 1 + $interestRate / $paymentsPerYear;
// Determine periodic payment
$periodicPayment = $balance * pow($intCalc,$totalPayments) * ($intCalc - 1) /
(pow($intCalc,$totalPayments) - 1);
// Round periodic payment to two decimals
$periodicPayment = round($periodicPayment,2);
// Create table
echo "<table width='50%' align='center' border='1'>";

echo "<tr>
<th>Payment Number</th><th>Balance</th>
<th>Payment</th><th>Interest</th><th>Principal</th>
</tr>";
// Call recursive function
amortizationTable($paymentNumber, $periodicPayment, $balance,
$monthlyInterest);
// Close table
echo "</table>";
?>