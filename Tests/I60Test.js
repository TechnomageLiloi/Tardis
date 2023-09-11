describe('Interstate60 object', function() {
  it('Interstate60 sub-objects', function() {
    expect(Interstate60 instanceof Object).toBeTruthy();
    expect(Interstate60.Application instanceof Object).toBeTruthy();
    expect(Interstate60.Application.Diary instanceof Object).toBeTruthy();
  });

  it('Interstate60.Application.Diary functions', function() {
    expect(Interstate60.Application.Diary.create instanceof Function).toBeTruthy();
    expect(Interstate60.Application.Diary.edit instanceof Function).toBeTruthy();
    expect(Interstate60.Application.Diary.save instanceof Function).toBeTruthy();
    expect(Interstate60.Application.Diary.show instanceof Function).toBeTruthy();
  });
});
