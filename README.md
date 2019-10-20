# DeGeo-PHP v 0.0.5

DeGeo PHP Libraries, Functions and Experiments.

## Coming Soon
 - More Libraries and Examples.

## Libraries

 - Queue: Queue and prioritize data.
 - Layout Queue: Queue and prioritize Layouts for rendering after data processing.
 - Messages Queue: Queue and prioritize Messages for rendering at a later time.
 - Breadcrumbs Queue: Queue and prioritize Breadcrumbs for rendering at a later time.
 - Metatag Queue: Queue and prioritize Metatags for rendering at a later time.
 - Hosts: Hosts Management Library for CDN integration.
 - Layout: Layout Management for dynamic rendering of responsive containers, rows, and columns.
 - Bootstrap 4 Layout: Bootstrap 4 Layout for dynamic rendering of Bootstrap 4 containers, rows, and columns.

### Queue Library
 > Queue and prioritize data.

**Queue Data:**
```
\DeGeo\Queue->queue( [ 'id' => 'test1', 'position' => 50 ] );
\DeGeo\Queue->queue( [ 'id' => 'test2', 'position' => 20 ] );
\DeGeo\Queue->queue( [ 'id' => 'test3', 'position' => 80 ] );
\DeGeo\Queue->queue( [ 'id' => 'test4', 'position' => 10 ] );
```

**Get Queued Data:**
```
$queue = \DeGeo\Queue->get_queue();
```

**Get Randomized Queued Data:**
```
$queue = \DeGeo\Queue->get_queue( $sort = TRUE, $reversed = TRUE );
```

**Empty Queue Data:**
```
\DeGeo\Queue->empty();
```

_See CHANGELOG.md for version history_