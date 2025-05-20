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
    <h1>Hello from view Index</h1>

    <table>
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice) : ?>
                <tr>
                    <td><?= $invoice['invoice_number']; ?></td>
                    <td><?= $invoice['amount']; ?></td>
                    <td class="<?= \App\Enums\InvoiceStatus::tryFrom($invoice['status'])->color()->getColor() ?>">
                        <?= \App\Enums\InvoiceStatus::tryFrom($invoice['status'])->toString() ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>