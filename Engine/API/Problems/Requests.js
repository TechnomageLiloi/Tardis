/**
 * Blueprints request function list.
 *
 * @type {{edit: API.Blueprints.edit, show: API.Blueprints.show, save: (function(*=): (undefined)), create: (function(*=): (undefined)), remove: (function(*=): (undefined))}}
 */
API.Problems = {
    collection: function (uid)
    {
        API.request('Blueprint.Problems.Collection', {
            'uid': uid
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    show: function (key_problem)
    {
        API.request('Blueprint.Problems.Show', {
            'key_problem': key_problem
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    create: function (key_blueprint, id_type, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Blueprint.Problems.Create', {
            'key_blueprint': key_blueprint,
            'id_type': id_type
        }, function (data) {
            API.Problems.collection(uid);
        }, function () {

        });
    },

    remove: function (key_problem, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Blueprint.Problems.Remove', {
            'key_problem': key_problem
        }, function (data) {
            API.Problems.collection(uid);
        }, function () {

        });
    },

    edit: function (key_problem, uid)
    {
        API.request('Blueprint.Problems.Edit', {
            'key_problem': key_problem,
            'uid': uid
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    save: function (key_problem, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Blueprint.Problems.Save', {
            'key_problem': key_problem,
            'title': jq_block.find('[name="title"]').val(),
            'mark': jq_block.find('[name="mark"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'type': jq_block.find('[name="type"]').val()
        }, function (data) {
            API.Problems.collection(uid);
        }, function () {

        });
    }
}