var formatRepo = function (repo) {
    if (repo.loading) {
        return repo.text;
    }
    var markup ='<div class="row">' + 
                    '<div class="col-sm-5">' +
                        '<img src="' + repo.owner.avatar_url + '" class="img-rounded" style="width:30px" />' +
                        '<b style="margin-left:5px">' + repo.full_name + '</b>' + 
                    '</div>' +
                    '<div class="col-sm-3"><i class="fa fa-code-fork"></i> ' + repo.forks_count + '</div>' +
                    '<div class="col-sm-3"><i class="fa fa-star"></i> ' + repo.stargazers_count + '</div>' +
                '</div>';

    if (repo.description) {
      markup += '<h5>' + repo.description + '</h5>';
    }
    return '<div style="overflow:hidden;">' + markup + '</div>';
};
var formatRepoSelection = function (repo) {
    return repo.full_name || repo.text;
}

var resultData = function (data, params) {
    params.page = params.page || 1;
    return {
        results: data.items,
        pagination: {
            more: (params.page * 30) < data.total_count
        }
    };
}