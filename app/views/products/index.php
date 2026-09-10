<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Management</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
        }

        .buttons a {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-left: 5px;
        }

        .add {
            background: #222;
            color: white;
        }

        .logout {
            background: #dc3545;
            color: white;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        tr:nth-child(even) {
            background: #fafafa;
        }

        .edit {
            color: #0066cc;
            text-decoration: none;
        }

        .delete {
            color: #dc3545;
            text-decoration: none;
        }

        .empty {
            text-align: center;
            color: #777;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <h1>Product Management</h1>

        <div class="buttons">

            <a
                class="add"
                href="<?= site_url('products/create') ?>"
            >
                + Add Product
            </a>

            <a
                class="logout"
                href="<?= site_url('logout') ?>"
                onclick="return confirm('Are you sure you want to logout?');"
            >
                Logout
            </a>

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                <?php if (!empty($products)): ?>

                    <?php foreach ($products as $product): ?>

                        <tr>

                            <td>
                                <?= (int) $product['id'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($product['product_name']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($product['description'] ?? '') ?>
                            </td>

                            <td>
                                ₱<?= number_format((float) $product['price'], 2) ?>
                            </td>

                            <td>
                                <?= (int) $product['quantity'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($product['created_at'] ?? '') ?>
                            </td>

                            <td>

                                <a
                                    class="edit"
                                    href="<?= site_url('products/edit/' . $product['id']) ?>"
                                >
                                    Edit
                                </a>

                                |

                                <a
                                    class="delete"
                                    href="<?= site_url('products/delete/' . $product['id']) ?>"
                                    onclick="return confirm('Delete this product?');"
                                >
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="7" class="empty">
                            No products found.
                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>