/**
 * Blueprints request function list.
 *
 * @type {{edit: API.Blueprints.edit, show: API.Blueprints.show, save: (function(*=): (undefined)), create: (function(*=): (undefined)), remove: (function(*=): (undefined))}}
 */
API.Blueprints = {
    show: function (uid)
    {
        API.request('Blueprint.Blueprints.Show', {
            'uid': uid
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    create: function (uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Blueprint.Blueprints.Create', {
            'uid': uid
        }, function (data) {
            API.Blueprints.show('root');
        }, function () {

        });
    },

    remove: function (uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Blueprint.Blueprints.Remove', {
            'uid': uid
        }, function (data) {
            API.Blueprints.show('root');
        }, function () {

        });
    },

    edit: function (uid)
    {
        API.request('Blueprint.Blueprints.Edit', {
            'uid': uid
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    save: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Blueprint.Blueprints.Save', {
            'key': key,
            'uid': jq_block.find('[name="uid"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            API.Blueprints.show(jq_block.find('[name="uid"]').val());
        }, function () {

        });
    }
}