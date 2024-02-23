TARDIS.Quests = {
    collection: function (uid)
    {
        API.request('TARDIS.Quests.Collection', {
            'uid': uid
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
            TARDIS.Lessons.timetable();
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
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    }
}