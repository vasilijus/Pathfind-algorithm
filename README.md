# Notes

Used the A Star algorithm

## Patfind
Start a php server from root folder

```bash
php -S {MACHINE_IP} -t src
```
Add the required parameters to the Variables:
- $startPoint
- $endPoint
- $grid
---

```php
//Init Map
$grid = [
    ["Empty", "Empty", "Empty", "Empty", "Empty"],
    ["Empty", "Obstacle", "Obstacle", "Obstacle", "Empty"],
    ["Empty", "Obstacle", "Obstacle", "Empty", "Empty"],
    ["Empty", "Empty", "Empty", "Empty", "Empty"],
    ["Empty", "Empty", "Empty", "Empty", "Empty"],
];
//Point A
$startPoint = new Position(0,0);
//Point B
$endPoint = new Position(2,3);
// Init pathfind
```
---

Open the browser for the ammount of moves it takes to reach from A - B, and a visualized display

## Tests
Some issues occured with testing, 