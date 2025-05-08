let levels = [];

levels[0] =
	{
		map:
			[
				[2,1,0,0,0,0,1,0,2],
				[0,0,1,0,1,0,0,0,0],
				[2,0,1,0,0,1,1,0,2],
				[0,0,0,0,1,0,1,0,0],
				[2,1,0,1,0,0,0,1,2],
				[0,0,0,0,0,1,0,0,0],
				[2,2,2,2,0,2,2,2,2],
			],
		playerlevier:
			{
				x:4,
				y:6
			},
		goallevier:
			{
				x:8,
				y:3
			},
		theme:'levier'
	};

function Game(id, level)
	{
		this.el = document.getElementById(id);
		this.tileTypes = ['floor','wall','rien'];
		this.tileDim = 60;
		this.map = level.map;
		this.theme = level.theme
		this.playerlevier = {...level.playerlevier};
		this.goallevier = {...level.goallevier};
	}

Game.prototype.populateMap = function()
	{
		this.el.className = 'game-container ' + this.theme;
		let tiles = document.getElementById('tiles');
		for (var y = 0; y < this.map.length; ++y)
			{
				for (var x = 0; x < this.map[y].length; ++x)
					{
						let tileCode = this.map[y][x];
						let tileType = this.tileTypes[tileCode];
						let tile = this.createEl(x, y, tileType);
						tiles.appendChild(tile);
					}
			}
	}

Game.prototype.createEl = function(x,y,type)
	{
		let el = document.createElement('div');
		el.className = type;
		el.style.width = el.style.height = this.tileDim + 'px';
		el.style.left = x*this.tileDim + 'px';
		el.style.top = y*this.tileDim + 'px';
		return el;
	}

Game.prototype.placeSprite = function(type)
	{
		let x = this[type].x
		let y = this[type].y;
		let sprite = this.createEl(x,y,type);
		sprite.id = type;
		sprite.style.borderRadius = this.tileDim + 'px';
		let layer = this.el.querySelector('#sprites');   
		layer.appendChild(sprite);
		return sprite;
	}

Game.prototype.sizeUp = function()
	{
		let map  = this.el.querySelector('.map-levier');
		map.style.height = this.map.length * this.tileDim + 'px';
		map.style.width = this.map[0].length * this.tileDim + 'px';
	}
	
Game.prototype.moveplayerlevier = function(event)
	{
		event.preventDefault();
		if (event.keyCode < 37 || event.keyCode > 40)
			{
				return;
			}
		switch (event.keyCode)
			{
				case 37:
					this.moveLeft();
					break;
				case 38:
					this.moveUp();
					break;
				case 39:
					this.moveRight();
					break;
				case 40:
					this.moveDown();
					break;
			}
	}

Game.prototype.checkgoallevier = function()
	{
		if (this.playerlevier.y == this.goallevier.y && this.playerlevier.x == this.goallevier.x)
			{
				alert ('En passant le levier, quelque chose semble s\'enclencher.');
				document.location.href="cage.php";
			}
	}

Game.prototype.keyboardListener = function()
	{
		document.addEventListener('keydown', event =>
			{
				this.moveplayerlevier(event);
				this.checkgoallevier();
			});
	}

Game.prototype.moveLeft = function(sprite)
	{
		if (this.playerlevier.x == 0)
			{
				return;
			}
		let nextTile = this.map[this.playerlevier.y][this.playerlevier.x - 1];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.playerlevier.x -=1;
		this.updateHoriz(sprite);
	}

Game.prototype.moveUp = function()
	{
		if (this.playerlevier.y == 0)
			{
				return;
			}
		let nextTile = this.map[this.playerlevier.y-1][this.playerlevier.x ];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.playerlevier.y -=1;
		this.updateVert();
	}

Game.prototype.moveRight = function(sprite)
	{
		if (this.playerlevier.x == this.map[this.playerlevier.y].length - 1)
			{
				return;
			}
		let nextTile = this.map[this.playerlevier.y][this.playerlevier.x + 1];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.playerlevier.x +=1;
		this.updateHoriz(sprite);
	}

Game.prototype.moveDown = function()
	{
		if (this.playerlevier.y == this.map.length - 1)
			{
				return;
			}
		let nextTile = this.map[this.playerlevier.y + 1][this.playerlevier.x];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.playerlevier.y +=1;
		this.updateVert();
	}

Game.prototype.updateHoriz = function(sprite)
	{
		this.playerlevier.el.style.left = this.playerlevier.x * this.tileDim+ 'px';
	};

Game.prototype.updateVert = function()
	{
		this.playerlevier.el.style.top = this.playerlevier.y * this.tileDim+ 'px';
	};
	
Game.prototype.buttonListeners = function()
	{
		let up = document.getElementById('up');
		let left = document.getElementById('left');
		let down = document.getElementById('down')
		let right = document.getElementById('right');
		let obj = this;
		up.addEventListener('mousedown',function()
			{
				obj.moveUp();
				obj.checkgoallevier();   
			});
		down.addEventListener('mousedown',function()
			{
				obj.moveDown();
				obj.checkgoallevier();   
			});
		left.addEventListener('mousedown',function()
			{
				obj.moveLeft();
				obj.checkgoallevier();   
			});
		right.addEventListener('mousedown',function()
			{
				obj.moveRight();
				obj.checkgoallevier();   
			});
	}

function init()
	{
		let myGame = new Game('game-container-1',levels[0]);
		myGame.populateMap();
		myGame.sizeUp();
		myGame.placeSprite('goallevier');
		let playerlevierSprite = myGame.placeSprite('playerlevier');
		myGame.playerlevier.el = playerlevierSprite;
		myGame.keyboardListener();
		myGame.buttonListeners();
	}

init();