<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

Artisan::add(new LoadCandidates);
Artisan::add(new LoadResults);
Artisan::add(new LoadCandidacies);
Artisan::add(new LoadPollResults);
Artisan::add(new SetPositions);
Artisan::add(new MergeCandidates);
Artisan::add(new MergeParties);
