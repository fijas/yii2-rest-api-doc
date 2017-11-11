<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token"
          content="lS7CuVa4g2uoQwNcMZlAS5L2RhVEAl0GX8NvI_wl2_3dWIPpAenwUs57RBZZ9HZ_w6QIYS5DbkkutlpQpleKmQ==">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jsonview/1.2.3/jquery.jsonview.min.css" />
    <style type="text/css">
        .docs-index {
            margin-top: 10px;
        }
        .docs-index .label {
            color: #333;
        }
        .docs-index .pointer {
            cursor: pointer
        }
        .docs-index .ellipsis {
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>
    <title>Documentation</title>
</head>
<body>

<div class="page-content">
    <div class="container-fluid">
        <?= $content ?>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jsonview/1.2.3/jquery.jsonview.min.js"></script>
<script src="<?= \fijas\yii2\rest_api_doc\ModuleAsset::register($this)->baseUrl ?>/doc.js" ></script>
</body>
</html>