<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Product</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            margin-top: 20px;
            padding: 11px 20px;
            border: none;
            border-radius: 5px;
            background: #222;
            color: white;
            cursor: pointer;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Add Product</h1>

    <form
        action="<?= site_url('products/store') ?>"
        method="POST"
    >

        <label for="product_name">
            Product Name
        </label>

        <input
            type="text"
            id="product_name"
            name="product_name"
            maxlength="100"
            required
        >

        <label for="description">
            Description
        </label>

        <textarea
            id="description"
            name="description"
        ></textarea>

        <label for="price">
            Price
        </label>

        <input
            type="number"
            id="price"
            name="price"
            step="0.01"
            min="0"
            required
        >

        <label for="quantity">
            Quantity
        </label>

        <input
            type="number"
            id="quantity"
            name="quantity"
            min="0"
            required
        >

        <button type="submit">
            Save Product
        </button>

    </form>

    <a
        class="back"
        href="<?= site_url('products') ?>"
    >
        ← Back to Products
    </a>

</div>

</body>

</html>