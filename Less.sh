#!/usr/bin/env bash

# Compile all I60 LESS to CSS

lessc ./Engine/Style.less ./Engine/Style.css
lessc ./Engine/API/Application/Diary/Edit/Style.less ./Engine/API/Application/Diary/Edit/Style.css
lessc ./Engine/API/Application/Diary/Show/Style.less ./Engine/API/Application/Diary/Show/Style.css