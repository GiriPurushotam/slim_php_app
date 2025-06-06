<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            border: 1px #eee solid;
            padding: 5px;
        }

        .color-green {
            color: green;
        }

        .color-red {
            color: red;
        }

        .color-grey {
            color: grey;
        }

        .color-orange {
            color: orange;
        }
    </style>
    <center>
        <h1>Hello from view Index</h1>
    </center>

    <table>
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($testInvoices)): ?>
                <tr>
                    <td colspan="4">No Invoice Founs</td>
                </tr>
            <?php else : ?>
                <?php foreach ($testInvoices as $testInvoice) : ?>
                    <tr>
                        <td><?= $testInvoice['invoice_number']; ?></td>
                        <td><?= number_format($testInvoice['amount'], 2); ?></td>
                        <td><?= $testInvoice['status'] ?>
                        <td>
                            <?php if ($testInvoice['dueDate']) : ?>
                                <?= date('m/d/Y', strtotime($testInvoice['dueDate'])) ?>
                            <?php else : ?>
                                N/A
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</body>

</html>