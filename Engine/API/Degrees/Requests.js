Rune.Degrees = {
    getCollection: function ()
    {
        API.request('Rune.Degrees.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (uid)
    {
        API.request('Rune.Degrees.Show', {
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

        API.request('Rune.Degrees.Create', {

        }, function (data) {
            Rune.Degrees.getCollection();
        }, function () {

        });
    },

    remove: function (uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Degrees.Remove', {
            'uid': uid
        }, function (data) {
            API.Blueprints.show('root');
        }, function () {

        });
    },

    edit: function (uid)
    {
        API.request('Rune.Degrees.Edit', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key, apply)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        if(typeof apply === 'undefined')
        {
            apply = false;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Degrees.Save', {
            'key': key,
            'uid': jq_block.find('[name="uid"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            if(!apply)
            {
                Rune.Degrees.show(jq_block.find('[name="uid"]').val());
                return;
            }

            alert('Degree saved.');
        }, function () {

        });
    }
}