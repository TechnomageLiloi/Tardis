TARDIS.Quests = {
    collection: function ()
    {
        API.request('TARDIS.Quests.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_quest)
    {
        API.request('TARDIS.Quests.Show', {
            'key_quest': key_quest
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (keyDegree)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Quests.Create', {
            'key_degree': keyDegree
        }, function (data) {
            TARDIS.Quests.collection();
        }, function () {

        });
    },

    remove: function (key_quest, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Quests.Remove', {
            'key_quest': key_quest
        }, function (data) {
            TARDIS.Quests.collection(uid);
        }, function () {

        });
    },

    edit: function (key_quest)
    {
        API.request('TARDIS.Quests.Edit', {
            'key_quest': key_quest
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_quest)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Quests.Save', {
            'key_quest': key_quest,
            'title': jq_block.find('[name="title"]').val(),
            'summary': jq_block.find('[name="summary"]').val(),
        }, function (data) {
            TARDIS.Quests.collection();
        }, function () {

        });
    },

    done: function (key_quest, status)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Quests.Done', {
            'key_quest': key_quest,
            'status': status
        }, function (data) {
            TARDIS.Quests.collection();
        }, function () {

        });
    }
}