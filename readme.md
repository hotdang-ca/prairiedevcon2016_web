# Unofficial Prairie Dev Con API Service

----
## What is Prairie Dev Con?
see [Prairie Dev Con](http://www.prairiedevcon.com)

> Organizations are looking for ways to increase their employee’s skills while maximizing training and professional development budgets. Over six years ago the first Prairie Developer Conference was held in Regina, Saskatchewan to meet this need. It provided a high quality professional development opportunity locally, without the high costs of travel and accommodation typically associated with remote conferences.

>Our April 11-12, 2016 event in Winnipeg will be the eleventh Prairie Dev Con!

----
## What is this, then?
This project is an unofficial API Service written in Laravel, to power an unofficial Mobile App because, well, their app isn't done yet.

---
## Who made this?
James Robert Perih, of [Hot Dang Interactive](http://hotdang.ca/). Hot Dang Interactive helps small business achieve their **hot dang!** moment by leveraging technology in interesting ways.

----
## HowTo
When this goes live, there are a couple of routes of interest:

1. ** */api/timeslots* **
This endpoint lists all timeslots, along with associated Rooms, Speaker, Session info

2. ** */api/timeslots/{timeslot_id}* **
As above, but just the specific timeslot

3. ** */api/sessions* **
List all sessions

4. ** */api/sessions/{session_id}* **
List one specific session

5. ** */api/speakers* **
List all speakers

6. ** */api/speakers/{speaker_id}* **
List one specific speaker

----
## changelog
* 30-Mar-2016 Sessions & Speakers
* 31-Mar-2016 Timeslots & Rooms
