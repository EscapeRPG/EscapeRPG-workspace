let levels = [];

levels[0] =
	{
		map:
			[
				[0,0,0,0,0],
				[0,0,0,0,0],
				[0,0,0,0,0],
				[0,0,0,0,0],
				[0,0,0,0,0],
				[0,0,0,0,0],
				[0,0,0,0,0],
			],
		loganhaubans:
			{
				x:0,
				y:6
			},
		goalhaubans:
			{
				x:2,
				y:0
			},
		theme:'haubans'
	};

function Game(id, level)
	{
		this.el = document.getElementById(id);
		this.tileTypes = ['cordage'];
		this.tileDim = 120;
		this.map = level.map;
		this.theme = level.theme
		this.loganhaubans = {...level.loganhaubans};
		this.goalhaubans = {...level.goalhaubans};
	}

Game.prototype.populateMap = function()
	{
		this.el.className = 'game-container ' + this.theme;
		let tiles = document.getElementById('tileshaubans');
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
		let map  = this.el.querySelector('.map-haubans');
		map.style.height = this.map.length * this.tileDim + 'px';
		map.style.width = this.map[0].length * this.tileDim + 'px';
	}
	
Game.prototype.moveloganhaubans = function(event)
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
	
var echec = false;

Game.prototype.checkgoalhaubans = function()
	{
		if (this.loganhaubans.y == this.goalhaubans.y && this.loganhaubans.x == this.goalhaubans.x)
			{
				if (echec == false)
					{
						document.location.href="tempete1.php";
					}
				else
					{
						document.location.href="tempete2.php";
					}
			}
		else if (this.loganhaubans.y == 5 && this.loganhaubans.x == 0 || this.loganhaubans.y == 4 && this.loganhaubans.x == 3 || this.loganhaubans.y == 3 && this.loganhaubans.x == 1 || this.loganhaubans.y == 0 && this.loganhaubans.x == 3)
			{
				this.moveDown();
				alert ('En passant ici, vous sentez l\'un des cordages céder, manquant vous faire tomber.');
				echec = true;
			}
		else if (this.loganhaubans.y == 5 && this.loganhaubans.x == 1 || this.loganhaubans.y == 0 && this.loganhaubans.x == 0 || this.loganhaubans.y == 0 && this.loganhaubans.x == 4)
			{
				this.moveDown();
				alert ('En essayant d\'attraper le cordage, vous glissez sur un amas de mousse qui s\'est accumulé.');
				echec = true;
			}
		else if (this.loganhaubans.y == 1 && this.loganhaubans.x == 1 || this.loganhaubans.y == 3 && this.loganhaubans.x == 2 || this.loganhaubans.y == 5 && this.loganhaubans.x == 4)
			{
				this.moveDown();
				alert ('Vous essayez de grimper les haubans mais, en passant ici, vous glissez un peu sur de la mousse et tentez de vous rattraper. Vous agrippez les cordages mais des petits amas de calcaire s\'effritent sous vos doigts et vous vous rattrapez en catastrophe.');
				echec = true;
			}
		else if (this.loganhaubans.y == 2 && this.loganhaubans.x == 4)
			{
				this.moveDown();
				alert ('Vous saisissez le cordage mais de petits amas de calcaire s\'effritent sous vos doigts et vous vous rattrapez de justesse.');
				echec = true;
			}
	}

Game.prototype.keyboardListener = function()
	{
		document.addEventListener('keydown', event =>
			{
				this.moveloganhaubans(event);
				this.checkgoalhaubans();
			});
	}

Game.prototype.moveLeft = function(sprite)
	{
		if (this.loganhaubans.x == 0)
			{
				return;
			}
		this.loganhaubans.x -=1;
		this.updateHoriz(sprite);
	}

Game.prototype.moveUp = function()
	{
		if (this.loganhaubans.y == 0)
			{
				return;
			}
		this.loganhaubans.y -=1;
		this.updateVert();
	}

Game.prototype.moveRight = function(sprite)
	{
		if (this.loganhaubans.x == this.map[this.loganhaubans.y].length - 1)
			{
				return;
			}
		this.loganhaubans.x +=1;
		this.updateHoriz(sprite);
	}

Game.prototype.moveDown = function()
	{
		if (this.loganhaubans.y == this.map.length - 1)
			{
				return;
			}
		this.loganhaubans.y +=1;
		this.updateVert();
	}

Game.prototype.updateHoriz = function(sprite)
	{
		this.loganhaubans.el.style.left = this.loganhaubans.x * this.tileDim+ 'px';
	};

Game.prototype.updateVert = function()
	{
		this.loganhaubans.el.style.top = this.loganhaubans.y * this.tileDim+ 'px';
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
				obj.checkgoalhaubans();   
			});
		down.addEventListener('mousedown',function()
			{
				obj.moveDown();
				obj.checkgoalhaubans();   
			});
		left.addEventListener('mousedown',function()
			{
				obj.moveLeft();
				obj.checkgoalhaubans();   
			});
		right.addEventListener('mousedown',function()
			{
				obj.moveRight();
				obj.checkgoalhaubans();   
			});
	}

function init()
	{
		let myGame = new Game('game-container-1',levels[0]);
		myGame.populateMap();
		myGame.sizeUp();
		myGame.placeSprite('goalhaubans');
		let loganhaubansSprite = myGame.placeSprite('loganhaubans');
		myGame.loganhaubans.el = loganhaubansSprite;
		myGame.keyboardListener();
		myGame.buttonListeners();
	}

init();