<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Documentation';

$methodColorMap = [
    'GET' => 'info',
    'HEAD' => 'info',
    'OPTIONS' => 'info',
    'DELETE' => 'danger',
    'POST' => 'success',
    'PUT' => 'warning',
    'PATCH' => 'warning',
];

$asset = \fijas\yii2\rest_api_doc\ModuleAsset::register($this);
?>
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
        <div class="docs-index">
            <div class="row">
                <div class="col-lg-4 pull-left">
                    <div class="form-group">
                        <input class="form-control " type="text" id="base_url" placeholder="Base URL"/>
                    </div>
                </div>
                <div class="col-lg-4 pull-right">
                    <div class="form-group">
                        <input class="form-control " type="text" id="token" placeholder="Authentication Token"/>
                    </div>
                </div>
            </div>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach ($rules as $ei => $entity) : ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#<?= $entity['id'] ?>">
                                    <?= $entity['title'] ?>
                                </a>
                            </h4>
                        </div>
                        <div id="<?= $entity['id'] ?>" class="panel-collapse collapse" role="tabpanel">
                            <div class="panel-body">

                                <div class="list-group" id="<?= $entity['id'] ?>-list" role="tablist"
                                     aria-multiselectable="true">
                                    <?php foreach ($entity['rules'] as $ri => $rule) : ?>
                                        <a class="endpoint-toggle list-group-item" role="button"
                                           data-parent="#<?= $entity['id'] ?>-list" data-toggle="collapse"
                                           href="#rule-<?= $ei ?>-<?= $ri ?>" aria-expanded="false"
                                           aria-controls="rule-<?= $ei ?>-<?= $ri ?>">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <span class="label bg-<?= $methodColorMap[$rule['method']] ?> pull-left col-lg-1 method"><?= $rule['method'] ?></span>
                                                    <span class="col-lg-11 text-nowrap ellipsis">
                                                <strong class="url"><?= htmlspecialchars($rule['url']) ?></strong>
                                                        <?php if (!empty($rule['description'])) : ?>
                                                            -
                                                            <i><?= htmlspecialchars(strip_tags($rule['description'])) ?></i>
                                                        <?php endif; ?>
                                            </span>


                                                </div>
                                            </div>
                                        </a>

                                        <div id="rule-<?= $ei ?>-<?= $ri ?>" class="panel panel-primary collapse"
                                             role="tabpanel">
                                            <div class="panel-body">
                                                <?php if (!empty($rule['description'])) : ?>
                                                    <p><?= $rule['description'] ?></p>
                                                <?php endif ?>
                                                <form class="form">
                                                    <input type="hidden" name="method"
                                                           value="<?= $rule['method'] ?>"/>
                                                    <input type="hidden" name="url"
                                                           value="<?= htmlspecialchars($rule['url']) ?>"/>
                                                    <?php if (!empty($rule['params'])) : ?>
                                                        <fieldset class="params">
                                                            <legend>Query Parameters</legend>
                                                            <?php foreach ($rule['params'] as $param) : ?>
                                                                <div class="form-group">
                                                                    <label><?= $param['title'] ?></label>
                                                                    <input data-key="<?= $param['key'] ?>"
                                                                           class="form-control" type="text"
                                                                           required="required"/>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </fieldset>
                                                    <?php endif; ?>
                                                    <?php if (!empty($rule['filters'])) : ?>
                                                        <fieldset class="filters">
                                                            <legend>Query Filters</legend>
                                                            <?php foreach ($rule['filters'] as $filter) : ?>
                                                                <div class="form-group">
                                                                    <label><?= $filter['title'] ?></label>
                                                                    <input data-key="<?= $filter['key'] ?>"
                                                                           class="form-control" type="text"/>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </fieldset>
                                                    <?php endif; ?>
                                                    <?php if (!empty($rule['expand'])) : ?>
                                                        <fieldset class="params expand">
                                                            <legend>Expand Parameters</legend>
                                                            <?php foreach ($rule['expand'] as $expand) : ?>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                               value="<?= $expand['key'] ?>"/>
                                                                        <?= $expand['title'] ?>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </fieldset>
                                                    <?php endif; ?>
                                                    <?php if (!in_array($rule['method'], ['GET', 'DELETE']) && empty($rule['fileFields'])) : ?>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-7">
                                                                    <label for="body-<?= $ri ?>">Request
                                                                        Body: </label>
                                                                    <textarea rows="10" id="body-<?= $ri ?>"
                                                                              class="form-control"
                                                                              name="body"></textarea>
                                                                </div>
                                                                <?php if (!empty($rule['fields'])) : ?>
                                                                    <div class="col-lg-5">
                                                                        <?php foreach ($rule['fields'] as $fi => $fields) : ?>
                                                                            <label>Sample Model #<?= $fi + 1 ?>
                                                                                : </label>
                                                                            <div class="well sample pointer">
                                                                                <?= \yii\helpers\Json::encode($fields) ?>
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($rule['fileFields'])) : ?>
                                                        <div class="files">
                                                            <?php foreach ($rule['fileFields'] as $field) : ?>
                                                                <div class="form-group">
                                                                    <label><?= ucfirst($field) ?></label>
                                                                    <input name="<?= $field ?>" class="form-control"
                                                                           type="file"/>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-group buttons">
                                                        <?php if (!in_array($rule['method'], ['GET', 'DELETE'])) : ?>
                                                            <button class="btn btn-default prettify">Prettify Body
                                                            </button>
                                                        <?php endif; ?>
                                                        <button class="btn btn-primary send <?php if ($rule['method'] == 'DELETE') print 'btn-danger' ?>">
                                                            Send
                                                        </button>
                                                    </div>
                                                    <div class="response well">
                                                        <p class="text-center loader hidden">Loading...</p>
                                                        <div class="data hidden">
                                                            <h5>Action: <?= $rule['method'] ?> <span
                                                                        class="final-url"></span></h5>
                                                            <h4>Status: <span class="element code"></span> (<span
                                                                        class="element text"></span>)</h4>
                                                            <h4>Headers:</h4>
                                                            <p class="element headers"></p>
                                                            <h4>Body:</h4>
                                                            <p class="element body"></p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <p class="pull-left">&copy; Ventures Onsite <?= date('Y') ?></p>
        </div>
    </footer>
</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jsonview/1.2.3/jquery.jsonview.min.js"></script>
<script src="<?= $asset->baseUrl ?>/doc.js" ></script>
</body>
</html>