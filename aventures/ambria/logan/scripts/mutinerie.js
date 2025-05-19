let levels = [];

levels[0] =
	{
		map:
			[
				[0,0,0,0,0,0,1,0,0,1,0,1,0,1,0,1,0,1,0,0,0,1,2],
				[0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,1],
				[0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0],
				[0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,1],
				[0,0,0,0,0,0,1,0,0,1,0,1,0,1,0,1,0,1,0,0,0,1,2],
			],
		player:
			{
				x:1,
				y:0
			},
		goal:
			{
				x:13,
				y:2
			},
		tresor:
			{
				x:20,
				y:4
			},
		garde1:
			{
				x:16,
				y:3
			},
		garde2:
			{
				x:10,
				y:0
			},
		theme:'default'
	};
	
function Game(id, level)
	{
		this.el = document.getElementById(id);
		this.tileTypes = ['floor','wall', 'sea'];
		this.tileDim = 40;
		this.map = level.map;
		this.theme = level.theme
		this.player = {...level.player};
		this.goal = {...level.goal};
		this.tresor = {...level.tresor};
		this.garde1 = {...level.garde1};
		this.garde2 = {...level.garde2};
	}

Game.prototype.populateMap = function()
	{
		this.el.className = 'game-container ' + this.theme;
		let tiles = document.getElementById('tiles');
		for (let y = 0; y < this.map.length; ++y)
			{
				for (let x = 0; x < this.map[y].length; ++x)
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
		let map  = this.el.querySelector('.game-map');
		map.style.height = this.map.length * this.tileDim + 'px';
		map.style.width = this.map[0].length * this.tileDim + 'px';
	}
	
Game.prototype.movePlayer = function(event)
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
	
let tresor = false,
	cracking1 = false,
	cracking2 = false,
	cracking3 = false,
	tresorimg = document.getElementById("tresorimg"),
	crack1 = document.getElementById("crack1"),
	crack2 = document.getElementById("crack2"),
	crack3 = document.getElementById("crack3"),
	audiocrack = new Audio('/escaperpg/sons/ambria/crackplancher.mp3'),
	audiogarde = new Audio('/escaperpg/sons/ambria/garde.mp3'),
	audiotresor = new Audio('/escaperpg/sons/ambria/taketresor.mp3'),
	audiodormeur = new Audio('/escaperpg/sons/ambria/dormeur.mp3');

Game.prototype.checkGoal = function()
	{
		if (this.player.y == this.goal.y && this.player.x == this.goal.x)
			{
				if (tresor == false)
					{
						alert("Vous ne pouvez pas partir avant d\'avoir récupéré votre part du butin.");
					}
				else
					{
						alert ('Prenant garde à chacun de vos pas, vous grimpez les marches menant au pont supérieur.');
						document.location.href="mutinerie2.php";
					}
			}
		else if (this.player.y == this.tresor.y && this.player.x == this.tresor.x)
			{
				if (tresor == false)
					{
						audiotresor.play();
						
						alert ('Vous prenez le trésor avec vous. Plus qu\'à sortir d\'ici.');
						tresorimg.className="hide";
						tresor = true;
					}
			}
		else if (this.player.y == 3 && this.player.x == 0 || this.player.y == 3 && this.player.x == 7 || this.player.y == 1 && this.player.x == 8 || this.player.y == 2 && this.player.x == 9 ||
		this.player.y == 3 && this.player.x == 12 || this.player.y == 1 && this.player.x == 18 || this.player.y == 3 && this.player.x == 19 || this.player.y == 0 && this.player.x == 20 || this.player.y == 2 && this.player.x == 20)
			{
				audiocrack.play();
				
				alert ('Vous marchez sur une latte qui grince sous votre poids.');
				document.location.href="mutinerie3.php";
			}
		else if (this.player.y == 0 && this.player.x == 2 || this.player.y == 1 && this.player.x == 1 || this.player.y == 1 && this.player.x == 2 || this.player.y == 1 && this.player.x == 3 || this.player.y == 2 && this.player.x == 2)
			{
				audiodormeur.play();
				
				alert ('Vous passez trop près de Barthy, en train de dormir. Il se réveille aussitôt.');
				document.location.href="mutinerie4.php";
			}
		else if (this.player.y == 1 && this.player.x == 4 || this.player.y == 3 && this.player.x == 4 || this.player.y == 4 && this.player.x == 1 || this.player.y == 4 && this.player.x == 3)
			{
				audiodormeur.play();
				
				alert ('Vous tentez de ramper sous le hamac, mais vous réveillez Lloyd qui y dormait.');
				document.location.href="mutinerie5.php";
			}
		else if (this.player.y == 1 && this.player.x == 9 || this.player.y == 1 && this.player.x == 10 || this.player.y == 0 && this.player.x == 10 || this.player.y == 1 && this.player.x == 11 ||
		this.player.y == 2 && this.player.x == 10 || this.player.y == 3 && this.player.x == 14 || this.player.y == 2 && this.player.x == 15 || this.player.y == 3 && this.player.x == 15 || this.player.y == 3 && this.player.x == 16)
			{
				audiogarde.play();
				
				alert ('Le garde qui surveillait le pont inférieur vous remarque et se place devant vous.');
				document.location.href="mutinerie6.php";
			}
		else if (this.player.y == 1 && this.player.x == 12)
			{
				if (cracking1 == false)
					{
						audiocrack.play();
						
						alert ('En passant, vous sentez la planche craquer très légèrement. Si vous repassez dessus, vous serez à coup sûr repéré.');
						crack1.className="cracking";
						cracking1 = true;
					}
				else
					{
						audiocrack.play();
						
						alert ('Vous marchez sur une latte qui grince sous votre poids.');
						document.location.href="mutinerie3.php";
					}
			}
		else if (this.player.y == 4 && this.player.x == 19)
			{
				if (cracking2 == false)
					{
						audiocrack.play();
						
						alert ('En passant, vous sentez la planche craquer très légèrement. Si vous repassez dessus, vous serez à coup sûr repéré.');
						crack2.className="cracking";
						cracking2 = true;
					}
				else
					{
						audiocrack.play();
						
						alert ('Vous marchez sur une latte qui grince sous votre poids. L\'un des gardes arrive dans la cambuse en courant.');
						document.location.href="mutinerie3.php";
					}
			}
		else if (this.player.y == 2 && this.player.x == 21)
			{
				if (cracking3 == false)
					{
						audiocrack.play();
						
						alert ('En passant, vous sentez la planche craquer très légèrement. Si vous repassez dessus, vous serez à coup sûr repéré.');
						crack3.className="cracking";
						cracking3 = true;
					}
				else
					{
						audiocrack.play();
						
						alert ('Vous marchez sur une latte qui grince sous votre poids. L\'un des gardes arrive dans la cambuse en courant.');
						document.location.href="mutinerie3.php";
					}
			}
	}

Game.prototype.keyboardListener = function()
	{
		document.addEventListener('keydown', event =>
			{
				this.movePlayer(event);
				this.checkGoal();
			});
	}

Game.prototype.moveLeft = function(sprite)
	{
		if (this.player.x == 0)
			{
				return;
			}
		let nextTile = this.map[this.player.y][this.player.x - 1];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.player.x -=1;
		this.updateHoriz(sprite);
	}

Game.prototype.moveUp = function()
	{
		if (this.player.y == 0)
			{
				return;
			}
		let nextTile = this.map[this.player.y-1][this.player.x ];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.player.y -=1;
		this.updateVert();
	}

Game.prototype.moveRight = function(sprite)
	{
		if (this.player.x == this.map[this.player.y].length - 1)
			{
				return;
			}
		let nextTile = this.map[this.player.y][this.player.x + 1];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.player.x +=1;
		this.updateHoriz(sprite);
	}

Game.prototype.moveDown = function()
	{
		if (this.player.y == this.map.length - 1)
			{
				return;
			}
		let nextTile = this.map[this.player.y + 1][this.player.x];
		if (nextTile == 1 || nextTile == 2)
			{
				return;
			}
		this.player.y +=1;
		this.updateVert();
	}

Game.prototype.updateHoriz = function(sprite)
	{
		this.player.el.style.left = this.player.x * this.tileDim+ 'px';
	};

Game.prototype.updateVert = function()
	{
		this.player.el.style.top = this.player.y * this.tileDim+ 'px';
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
				obj.checkGoal();   
			});
		down.addEventListener('mousedown',function()
			{
				obj.moveDown();
				obj.checkGoal();   
			});
		left.addEventListener('mousedown',function()
			{
				obj.moveLeft();
				obj.checkGoal();   
			});
		right.addEventListener('mousedown',function()
			{
				obj.moveRight();
				obj.checkGoal();   
			});
	}

function init()
	{
		let myGame = new Game('game-container-1',levels[0]);
		myGame.populateMap();
		myGame.sizeUp();
		myGame.placeSprite('goal');
		myGame.placeSprite('tresor');
		myGame.placeSprite('garde1');
		myGame.placeSprite('garde2');
		let playerSprite = myGame.placeSprite('player');
		myGame.player.el = playerSprite;
		myGame.keyboardListener();
		myGame.buttonListeners();
	}

init();
