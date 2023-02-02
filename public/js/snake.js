$(document).ready(function () {
  /*********************************/
  /*  VARIABLES
   **********************************/

  const WIDTH = 300;
  const HEIGHT = 400;
  const CASESIZE = 10;
  const SPEED = 90;

  /*********************************/
  /*  CANVAS
   **********************************/

  /**
   *   On crée HTML <canvas>.
   *   @param l
   *       La largeur (WIDTH) du canvas.
   *   @param h
   *       La topeur (HEIGHT) du canvas.
   */
  function createCanvas(w, h) {
    $("#game").append(
      $("<canvas />")
        .attr("id", "canvas")
        .attr("width", w)
        .attr("height", h)
        .text(
          "Quel dommage ! Votre navigateur internet ne supporte pas la technologie utilisée pour ce jeu."
        )
        .css({
          border: "2px solid",
          display: "none",
        })
    );
  }

/* Déclaration de la fonction, donc création du canvas */ 
  createCanvas(WIDTH, HEIGHT);

  /* Attribution du canvas. */
  let canvas = $("#canvas");

  /* Définition en 2d */
  let ctx = canvas[0].getContext("2d");




  /*********************************/
  /*  ALGORITHME
   **********************************/

  /* VARIABLES */
  let direction;
  let food;
  let snake;
  let score;
  let inBreak;
  let pressKey;

  /* Mouvements du serpent */
  $(document).keydown(function (e) {
    const key = e.which;

    if (key == "37" && direction != "right" && !pressKey) {
      direction = "left";
      pressKey = true;
    } else if (key == "38" && direction != "bottom" && !pressKey) {
      direction = "top";
      pressKey = true;
    } else if (key == "39" && direction != "left" && !pressKey) {
      direction = "right";
      pressKey = true;
    } else if (key == "40" && direction != "top" && !pressKey) {
      direction = "bottom";
      pressKey = true;
    }
  });

  /* Clic sur le bouton "Commencer". */
  $("#start").click(function () {
    $("footer").fadeOut(500);
    $("#menu").fadeOut(500, function () {
      $("header").slideDown(500);
      canvas.slideDown(500, function () {
        $("footer").slideDown(500, function () {
          inBreak = false;
          pressKey = false;
          canvas.focus();
          initialisation();
          play();
        });
      });
    });
  });

  /* Clic sur le bouton "Recommencer" du game over. */
  $("#restart").click(function () {
    $("footer").fadeOut(500);
    $("#end").fadeOut(500, function () {
      $("#end-desc").text("Le serpent a mordu sa queue !");
      $("header").slideDown(500);
      canvas.slideDown(500, function () {
        $("footer").slideDown(500, function () {
          inBreak = false;
          pressKey = false;
          canvas.focus();
          initialisation();
          play();
        });
      });
    });
  });

  /* Clic sur le bouton "Pause". */
  $("#pause").click(function () {
    if (inBreak) {
      canvas.focus();
      $("#pause").text("Pause");
      inBreak = false;
      play();
    } else {
      $("#pause").text("Continuer");
      inBreak = true;
      pause();
    }
  });

  /* Clic sur le bouton "Recommencer". */
  $("#reset").click(function () {
    pause();
    $("#pause").text("Pause");
    $("#pause").addClass("disabled");
    $(this).addClass("disabled");
    $("footer").slideUp(500);
    canvas.slideUp(500, function () {
      ctx.clearRect(0, 0, WIDTH, HEIGHT);
      canvas.slideDown(500, function () {
        $("footer").slideDown(500, function () {
          inBreak = false;
          pressKey = false;
          canvas.focus();
          $("#pause").removeClass("disabled");
          $("#reset").removeClass("disabled");
          initialisation();
          play();
        });
      });
    });
  });

  /**
   *   Initialise le jeu.
   */
  function initialisation() {
    direction = "right";
    createSnake();
    createfood();
    score = 0;
  }

  /**
   *   Lance le jeu.
   */
  function play() {
    if (typeof Game_Interval != "undefined") {
      clearInterval(Game_Interval);
    }

    /* On actualise les éléments selon la constante de SPEED. */
    Game_Interval = setInterval(update, SPEED);
    allowPressKeys = true;
  }

  /**
   *   Met en pause le jeu.
   */
  function pause() {
    clearInterval(Game_Interval);
    allowPressKeys = false;
  }

  /**
   *   Game over et affiche le score.
   *   @param score
   *       Le score.
   */
  function end(score) {

        $('footer').delay(600).slideUp(500, function() {
            canvas.slideUp(500, function() {
                ctx.clearRect(0, 0, WIDTH, HEIGHT);
            });
            $('header').slideUp(500, function() {
                $('#end').fadeIn(500, function() {
                    $('#end-desc').append('<br />Votre score est de ' + score + '.');
                })
                $('footer').fadeIn(500);
            })
        });
    }
    
    
    
  /**
   *   Crée le serpent.
   */
  function createSnake() {
    const longueurDepart = 5;
    snake = [];
    for (let i = longueurDepart - 1; i >= 0; i--) {
      snake.push({ x: i, y: 0 });
    }
  }

  /**
   *   Crée la nourriture.
   */
  function createfood() {
    food = {
      x: Math.round((Math.random() * (WIDTH - 20)) / CASESIZE),
      y: Math.round((Math.random() * (HEIGHT - 20)) / CASESIZE),
    };
  }

  /**
   *   Dessine les éléments du jeu sur une case.
   *   @param caseX
   *       La coordonnée x de la case.
   *   @param caseY
   *       La coordonnée y de la case.
   *   @param couleur
   *       La couleur de la case.
   */
  function draw(caseX, caseY, couleur) {
    ctx.fillStyle = couleur;
    ctx.fillRect(
      caseX * CASESIZE,
      caseY * CASESIZE,
      CASESIZE,
      CASESIZE
    );
    ctx.strokeStyle = "white";
    ctx.strokeRect(
      caseX * CASESIZE,
      caseY * CASESIZE,
      CASESIZE,
      CASESIZE
    );
  }

  /**
   *   Vérifie si une collision s'est produite avec une case du serpent.
   *   @param caseX
   *       La coordonnée x de la case.
   *   @param caseY
   *       La coordonnée y de la case.
   *   @param snake
   *       Le serpent.
   */
  function collision(caseX, caseY, snake) {
    for (let i = 0; i < snake.length; i++) {
      if (snake[i].x == caseX && snake[i].y == caseY) {
        return true;
      }
    }

    return false;
  }

  function update() {
    ctx.fillStyle = "#232323";
    ctx.fillRect(0, 0, WIDTH, HEIGHT);

    let caseX = snake[0].x;
    let caseY = snake[0].y;

    /* Déplacement du serpent */
    if (direction == "right") {
      caseX++;
      pressKey = false;
    } else if (direction == "left") {
      caseX--;
      pressKey = false;
    } else if (direction == "top") {
      caseY--;
      pressKey = false;
    } else if (direction == "bottom") {
      caseY++;
      pressKey = false;
    }

    /* Dépassement du terrain de jeu vertical et horizontal. */
    if (caseX == -1) {
      caseX = WIDTH / CASESIZE - 1;
    } else if (caseX == WIDTH / CASESIZE) {
      caseX = 0;
    }

    if (caseY == -1) {
      caseY = HEIGHT / CASESIZE - 1;
    } else if (caseY == HEIGHT / CASESIZE) {
      caseY = 0;
    }

    /* Gestion des collisions du serpent. */
    if (collision(caseX, caseY, snake)) {
      pause();
      end(score);
    }

    /* Si le serpent mange. */
    if (caseX == food.x && caseY == food.y) {
      var tail = { x: caseX, y: caseY };
      score++;
      createfood();
    } else {
      var tail = snake.pop();
      tail.x = caseX;
      tail.y = caseY;
    }

    /* Alors le serpent grandit de 1 */
    snake.unshift(tail);

    for (let i = 0; i < snake.length; i++) {
      let body = snake[i];
      draw(body.x, body.y, "#10312b");
    }

    draw(food.x, food.y, "#f2d19d");
    $("#score").text("Score : " + score);
  }
});