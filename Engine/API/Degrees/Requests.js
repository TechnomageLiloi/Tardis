Tardis.Degrees = {
    getCollection: function ()
    {
        API.request('Tardis.Degrees.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (uid)
    {
        API.request('Tardis.Degrees.Show', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Tardis.Degrees.Create', {

        }, function (data) {
            Tardis.Degrees.getCollection();
        }, function () {

        });
    },

    remove: function (uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Tardis.Degrees.Remove', {
            'uid': uid
        }, function (data) {
            API.Blueprints.show('root');
        }, function () {

        });
    },

    edit: function (uid)
    {
        API.request('Tardis.Degrees.Edit', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
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
        API.request('Tardis.Degrees.Save', {
            'key': key,
            'uid': jq_block.find('[name="uid"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            Tardis.Degrees.show(jq_block.find('[name="uid"]').val());
        }, function () {

        });
    }
}