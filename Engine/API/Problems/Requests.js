Tardis.Problems = {
    collection: function (uid)
    {
        API.request('Tardis.Problems.Collection', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_problem)
    {
        API.request('Tardis.Problems.Show', {
            'key_problem': key_problem
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (key_blueprint, id_type, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Tardis.Problems.Create', {
            'key_blueprint': key_blueprint,
            'id_type': id_type
        }, function (data) {
            Tardis.Problems.collection(uid);
        }, function () {

        });
    },

    remove: function (key_problem, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Tardis.Problems.Remove', {
            'key_problem': key_problem
        }, function (data) {
            Tardis.Problems.collection(uid);
        }, function () {

        });
    },

    edit: function (key_problem, uid)
    {
        API.request('Tardis.Problems.Edit', {
            'key_problem': key_problem,
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
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
        API.request('Tardis.Problems.Save', {
            'key_problem': key_problem,
            'title': jq_block.find('[name="title"]').val(),
            'mark': jq_block.find('[name="mark"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            Tardis.Problems.collection(uid);
        }, function () {

        });
    }
}