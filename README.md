# Database Schema

## Main models

### Genre

A genre represents a music style definition like *Rock*, *Blues*, *Dance*, etc.

### Album

An album represents a musical composition of multiple independant audio tracks on some kind of audio media like a compact disc or a vinyl record.

### Track

A track represents a single piece of music. Depending on the usage of the track model it can be either used as a stand-alone representation of a music track (like a single) or as a part of an album and/or part of a recording.

#### Stand-alone

If used stand-alone the track can have a download relation if a download link for that track exists.

#### Part of an album

If used as part of an album the relation to the download model should not be set as the download relation is being managed through the album model instead.

#### Part of a recording

If used as part of a recording the relation to the download model should not be set as the download relation is being managed through the recording model instead.

### Set

The set model represents a DJ set which will most likely consist of multiple audio tracks mixed together by a DJ. Depending on the length of a DJ set it will be represented through one or more recordings (see below).

### Recording

The recording model is used as kind of an interim layer for a dj set and can also be used to split up a DJ set into multiple parts if the DJ set is very long with each recording representing a part of the DJ set each one containing a separate download link.

In terms of file size you will most likely use one recording if you have a short to mid-length DJ set which perfectly fits into one file download. If you have a rather long DJ set containing multiple hours of music and you are forced to split it into multiple files or the DJ set is distributed through multiple files you will also have to use multiple recordings, one for each media file.

### Download

The download model is used to assign a relation to either a track (if that track is stand-alone), an album or a recording.

The download link set in this model can either be an internal file link (MP3, ZIP, etc.), a link to an internal page or a link to an external website.

As you can see in the relations chapter below, a track, album and/or recording can be related to one or more downloads. This kind of 1..n relation can be used to define multiple download links for a single track, album and/or recording like one MP3 download and one AAC download and one FLAC download.

## Relations between models

### Genre &rarr; Set / Track / Album

A genre can be related to the following models:

* Set
* Track
* Album

One genre can be related to one or more sets, tracks and/or albums. \
One set, track and/or album can be related to one or more genres.

### Track &rarr; Album / Recording

A track can be related to the following models:

* Album
* Recording

One track can (but does not need to) be related to exactly one album or one or more recordings. \
One recording and/or album can be related to (contain) one or more tracks.

### Download &rarr; Track / Album / Recording

A download can be related to the following models:

* Track
* Album
* Recording

One download can be related to exactly one track or exactly one album or exactly one recording. \
One track and/or album and/or recording can be related to one or more downloads.

### Recording &rarr; Set

One recording can be related to exactly one set. \
One set can be related to one or more recordings.
