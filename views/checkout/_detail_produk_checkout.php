<div class="kv-detail-content">
    <h3><?= $model->name;?></h3>
    <div class="row">
        <div class="col-sm-2">
            <div class="img-thumbnail img-rounded text-center">
                <img src="http://demos.krajee.com/images/book.jpg" style="padding:2px;width:100%">
                <div class="small text-muted">Published: 2016-04-01</div>
            </div>
        </div>
        <div class="col-sm-4">
            <table class="table table-bordered table-condensed table-hover small kv-table">
                <tbody><tr class="danger">
                    <th colspan="3" class="text-center text-danger">Buy Amount Breakup</th>
                </tr>
                <tr class="active">
                    <th class="text-center">#</th>
                    <th>Breakup</th>
                    <th class="text-right">Price</th>
                </tr>
                <tr>
                    <td class="text-center">1</td><td>Base Price</td><td class="text-right">188.10 </td>
                </tr>
                <tr>
                    <td class="text-center">2</td><td>Tax @ 6%</td><td class="text-right">12.54</td>
                </tr>
                <tr>
                    <td class="text-center">3</td><td>Shipping @ 4%</td><td class="text-right">8.36</td>
                </tr>
                <tr class="warning">
                    <th></th><th>Total</th><th class="text-right">209.00</th>
                </tr>
            </tbody></table>
        </div>
        <div class="col-sm-4">
            <table class="table table-bordered table-condensed table-hover small kv-table">
                <tbody><tr class="success">
                    <th colspan="3" class="text-center text-success">Sell Amount Breakup</th>
                </tr>
                <tr class="active">
                    <th class="text-center">#</th>
                    <th>Breakup</th>
                    <th class="text-right">Price</th>
                </tr>
                <tr>
                    <td class="text-center">1</td><td>Base Price</td><td class="text-right">3,600.00 </td>
                </tr>
                <tr>
                    <td class="text-center">2</td><td>Tax @ 6%</td><td class="text-right">240.00</td>
                </tr>
                <tr>
                    <td class="text-center">3</td><td>Shipping @ 4%</td><td class="text-right">160.00</td>
                </tr>
                <tr class="warning">
                    <th></th><th>Total</th><th class="text-right">4,000.00</th>
                </tr>
            </tbody></table>
        </div>
        <div class="col-sm-1">
            <div class="kv-button-stack">
            <button type="button" class="btn btn-default btn-lg" title="" data-toggle="tooltip" data-original-title="Add to cart"><span class="glyphicon glyphicon-shopping-cart"></span></button>
            <button type="button" class="btn btn-default btn-lg" title="" data-toggle="tooltip" data-original-title="Call for details"><span class="glyphicon glyphicon-earphone"></span></button>
            <button type="button" class="btn btn-default btn-lg" title="" data-toggle="tooltip" data-original-title="Email for details"><span class="glyphicon glyphicon-envelope"></span></button>
            </div>
        </div>
    </div>
</div>