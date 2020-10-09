/*
 * Name: Daniel Cox
 * Date: September 30 - Oct 4, 2019
 * Title: Game of Tie Toe Tac
 * Type: Console Base Game
 * Description: This is game of tic tac toe that work for the most part.
 * Note: It breaks when use enter c and use try to do downs and ups.
 */

//library
#include <iostream>
#include <string>
#include<ctime>
using namespace std;

//classes
//begin of the Board Class
class board {
public:
    //Class variables
    int newBoardArray[3][3];

    board()
    {
        //creates a 2d array for the board
       newBoardArray [0][0] = 1;
       newBoardArray[0][1] = 2;
       newBoardArray[0][2] = 3;

       newBoardArray[1][0] = 4;
       newBoardArray[1][1] = 5;
       newBoardArray[1][2] = 6;

       newBoardArray[2][0] = 7;
       newBoardArray[2][1] = 8;
       newBoardArray[2][2] = 9;

    }

    //display the board by using a for each
    void newDisplayBoard()
    {
        //go through each row and col
        for (auto & row : newBoardArray)
        {
            for (int col : row)
            {
                //print out each col
                cout << col << " ";
            }

            //next after each row
            cout << endl;
        }
    }

    //updates the board by using a for each
    void updateBoard()
    {
        //go through each row and col and update the with x and o where the ai and player is on the board.
        for (auto & row : newBoardArray) {
            for (int col : row)
            {
                if (col == 88)
                {
                    cout << 'X' << " ";
                }
                else if (col == 79)
                {
                    cout << 'O' << " ";
                }
                else
                {
                    cout << col << " ";
                }

            }
            //next line at the end of each
            cout << endl;

        }
    }
};
//end of the Board Class

//begin of the Player Class
class player {
public:
    //move the play where play wants to go on the board.
    void playMove (int userInput, int gameBoard[3][3], char *playerChar, int *playerCount)
    {
        //go through each row and col of the board
        for (int i = 0; i < 3; i++)
        {
            for (int j = 0; j < 3; j++)
            {

                if (userInput == gameBoard[i][j])
                {
                    //then replace it with "X" using ascii values
                    userInput = gameBoard[i][j];
                    gameBoard[i][j] = (char) *playerChar;
                    *playerCount = *playerCount + 1;
                }
            }

        }

    }
};
//end of the Player Class

//begin of the AI Class
class ai {
public:
    //if ai went first pick one of the corner or the center (this random Gen breaks)
   void aiWentFirst(int gameBoard[3][3], char *aiChar){
       srand(time(0));
       for(int i = 0; i<8; i++)
       {
           i = 1 + rand() % 8;

           if (i == 7)
           {
               gameBoard[0][0] = (char) *aiChar;
           } else if (i == 6)
           {
               gameBoard[0][1] = (char) *aiChar;

           } else if (i == 5) {
               gameBoard[0][2] = (char) *aiChar;
           } else if (i == 4) {

               gameBoard[1][0] = (char) *aiChar;
           } else if (i == 3) {
               gameBoard[1][2] = (char) *aiChar;

           } else if (i == 2) {
               gameBoard[2][0] = (char) *aiChar;

           } else if (i == 1) {
               gameBoard[2][1] = (char) *aiChar;

           } else if (i == 0) {
               gameBoard[2][2] = (char) *aiChar;

           }
       }
   }

    //block the player if the player is there
    void block(int gameBoard[3][3], char *playerChar, char *aiChar, int *aiGo)
    {
        for (int i = 0; i < 3; i++)
        {
            for (int j = 0; j < 3; j++)
            {
                //check if it can
                if (gameBoard[i][j] == (int) *playerChar && *aiGo != 1)
                {
                    //if space is free
                    if (gameBoard[i][j+ 1] != (int) *aiChar && gameBoard[i][j+ 1] != (int) *playerChar)
                    {
                        //block
                        gameBoard[i][j + 1] = (char) *aiChar;
                        *aiGo = 1;
                    }
                    else if (gameBoard[i][j - 1] != (int) *aiChar && gameBoard[i][j - 1] != (int) *playerChar)
                    {
                        //block
                        gameBoard[i][j - 1] = (char) *aiChar;
                        *aiGo = 1;
                    }
                }
            }
        }
    }

    //this take methods, the ai will take the location is say.
    //this is the wieght system
    void takeOne(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [0][0] != (int) *aiChar && gameBoard[0][0] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[0][0] = (char) *aiChar;
            *aiGo = 1;
        }

    }

    void takeTwo(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [0][1] != (int) *aiChar && gameBoard[0][1] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[0][1] = (char) *aiChar;
            *aiGo = 1;
        }

    }

    void takeThree(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [0][2] != (int) *aiChar && gameBoard[0][2] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[0][2] = (char) *aiChar;
            *aiGo = 1;
        }

    }

    void takeFour(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [1][0] != (int) *aiChar && gameBoard[1][0] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[1][0] = (char) *aiChar;
            *aiGo = 1;
        }

    }

    void takeSix(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [1][2] != (int) *aiChar && gameBoard[1][2] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[1][2] = (char) *aiChar;
            *aiGo = 1;
        }

    }


    void takeSeven(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [2][0] != (int) *aiChar && gameBoard[2][0] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[2][0] = (char) *aiChar;
            *aiGo = 1;
        }

    }

    void takeEight(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [2][1] != (int) *aiChar && gameBoard[2][1] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[2][1] = (char) *aiChar;
            *aiGo = 1;
        }

    }

    void takeNine(int gameBoard[3][3], char *aiChar, int *aiGo, char playerChar){
        //check to see if it free
        if (gameBoard [2][2] != (int) *aiChar && gameBoard[2][2] != (int) playerChar && *aiGo != 1) {
            //if free, take the spot
            gameBoard[2][2] = (char) *aiChar;
            *aiGo = 1;
        }

    }
    //when I pick one the corners move the center
    bool moveCenter(int gameBoard[3][3], char playerChar, char *aiChar, int *aiGo){
            //check to see if it can
            if ((gameBoard[0][0] == (int) playerChar && *aiGo != 1) || (gameBoard[0][2] == (int) playerChar && *aiGo != 1)|| (gameBoard[2][0] == (int) playerChar && *aiGo != 1) || (gameBoard[2][2] == (int) playerChar && *aiGo != 1))
            {
                //if so, take the center
                gameBoard[1][1] = (char) *aiChar;
                *aiGo = 1;
                return true;
            }
    }

    //weight moves
    //this a backup version of the one you show us in class
    void weightMoves(int gameBoard[3][3], char *aiChar, char playerChar, int *aiGo){

        //1 = 10     2 = 1  5 = 100 (I know this breaks)
        //3 = 10     4 = 1
        //7 = 10     6 = 1
        //9 = 10     8 = 1

        //if the space is free, it will take it

        if (gameBoard[1][1] != playerChar && gameBoard[1][1] != *aiChar && *aiGo != 1) {
                gameBoard[1][1] = (char) *aiChar;
                *aiGo = 1;

            }

        else if (gameBoard[1][2] != playerChar && gameBoard[1][2] != *aiChar && *aiGo != 1){
                gameBoard[1][2] = (char) *aiChar;
                *aiGo = 1;

            }

        else if (gameBoard[2][0] != playerChar && gameBoard[2][0] != *aiChar && *aiGo != 1){
            gameBoard[2][0] = (char) *aiChar;
            *aiGo = 1;

        }

        else if (gameBoard[2][2] != playerChar && gameBoard[2][2] != *aiChar && *aiGo != 1){
            gameBoard[2][2] = (char) *aiChar;
            *aiGo = 1;

        }

        else if (gameBoard[0][2] != playerChar && gameBoard[0][2] != *aiChar && *aiGo != 1){
            gameBoard[0][2] = (char) *aiChar;
            *aiGo = 1;

        }

        else if (gameBoard[0][0] != playerChar && gameBoard[0][0] != *aiChar && *aiGo != 1){
            gameBoard[0][0] = (char) *aiChar;
            *aiGo = 1;

        }


        if (*aiGo != 1) {
            if (gameBoard[1][0] != playerChar && gameBoard[1][0] != *aiChar){
                gameBoard[1][0] = (char) *aiChar;
                *aiGo = 1;
            }
            else if (gameBoard[2][1] != playerChar && gameBoard[2][1] != *aiChar){
                gameBoard[2][1] = (char) *aiChar;
                *aiGo = 1;
            }
        }


    }

    //this chance to see if it can win
    void canWin(int gameBoard[3][3], char playerChar, char *aiChar, int *aiGO){

        //cross
            if (gameBoard[0][0] == (int) *aiChar && gameBoard[0][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[0][2] != playerChar && gameBoard[0][2] != *aiChar)
                {
                    gameBoard[0][2] = (char) *aiChar;
                    *aiGO = 1;
                }

            }

            else if (gameBoard[0][1] == (int) *aiChar && gameBoard[0][2] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[0][0] != playerChar && gameBoard[0][0] != *aiChar)
                {
                    gameBoard[0][0] = (char) *aiChar;
                    *aiGO = 1;
                }
            }


            else if (gameBoard[1][0] == (int) *aiChar && gameBoard[1][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[1][2] != playerChar && gameBoard[1][2] != *aiChar)
                {
                    gameBoard[1][2] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            else if (gameBoard[1][2] == (int) *aiChar && gameBoard[1][1] == (int) *aiChar&& *aiGO != 1)
            {
                if (gameBoard[1][0] != playerChar && gameBoard[1][0] != *aiChar)
                {
                    gameBoard[1][0] = (char) *aiChar;
                    *aiGO = 1;
                }
            }


            else if (gameBoard[2][0] == (int) *aiChar && gameBoard[2][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[2][2] != playerChar && gameBoard[2][2] != *aiChar)
                {
                    gameBoard[2][2] = (char) *aiChar;
                    *aiGO = 1;
                }
            }


            else if (gameBoard[2][2] == (int) *aiChar && gameBoard[2][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[2][0] != playerChar && gameBoard[2][0] != *aiChar)
                {
                    gameBoard[2][0] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            //up and down
            else if (gameBoard[0][0] == (int) *aiChar && gameBoard[1][0] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[2][0] != playerChar && gameBoard[2][0] != *aiChar)
                {
                    gameBoard[2][0] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            else if (gameBoard[2][0] == (int) *aiChar && gameBoard[1][0] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[0][0] != playerChar && gameBoard[0][0] != *aiChar)
                {
                    gameBoard[0][0] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            else if (gameBoard[0][1] == (int) *aiChar && gameBoard[1][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[2][1] != playerChar && gameBoard[2][1] != *aiChar)
                {
                    gameBoard[2][1] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            else if (gameBoard[2][1] == (int) *aiChar && gameBoard[1][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[0][1] != playerChar && gameBoard[0][1] != *aiChar)
                {
                    gameBoard[0][1] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            else if (gameBoard[0][2] == (int) *aiChar && gameBoard[1][2] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[2][2] != playerChar && gameBoard[2][2] != *aiChar)
                {
                    gameBoard[2][2] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            else if (gameBoard[2][2] == (int) *aiChar && gameBoard[1][2] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[0][2] != playerChar && gameBoard[0][2] != *aiChar)
                {
                    gameBoard[0][2] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            //another win
            else if (gameBoard[0][0] == (int) *aiChar && gameBoard[1][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[2][2] != playerChar && gameBoard[2][2] != *aiChar)
                {
                    gameBoard[2][2] = (char) *aiChar;
                    *aiGO = 1;
                }
            }
            else if (gameBoard[1][1] == (int) *aiChar && gameBoard[2][2] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[0][0] != playerChar && gameBoard[0][0] != *aiChar)
                {
                    gameBoard[0][0] = (char) *aiChar;
                    *aiGO = 1;
                }
            }

            else if (gameBoard[0][2] == (int) *aiChar && gameBoard[1][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[2][0] != playerChar && gameBoard[2][0] != *aiChar)
                {
                    gameBoard[2][0] = (char) *aiChar;
                    *aiGO = 1;
                }
            }
            else if (gameBoard[2][2] == (int) *aiChar && gameBoard[1][1] == (int) *aiChar && *aiGO != 1)
            {
                if (gameBoard[0][2] != playerChar && gameBoard[0][2] != *aiChar)
                {
                    gameBoard[0][2] = (char) *aiChar;
                    *aiGO = 1;
                }
            }





    }

    //this check to see if there is a winner (only does it for the ai)
    bool checkWin(int gameBoard[3][3], char playerChar, char aiChar, string *winMsg, int rounds) {

        //cross
        if (gameBoard[0][0] == (int) aiChar && gameBoard[0][1] == (int) aiChar && gameBoard[0][2] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        } else if (gameBoard[1][0] == (int) aiChar && gameBoard[1][1] == (int) aiChar &&
                   gameBoard[1][2] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        } else if (gameBoard[2][0] == (int) aiChar && gameBoard[2][1] == (int) aiChar &&
                   gameBoard[2][2] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        }

            //up and down
        else if (gameBoard[0][0] == (int) aiChar && gameBoard[1][0] == (int) aiChar &&
                 gameBoard[2][0] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        } else if (gameBoard[0][1] == (int) aiChar && gameBoard[1][1] == (int) aiChar &&
                   gameBoard[2][1] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        } else if (gameBoard[0][2] == (int) aiChar && gameBoard[1][2] == (int) aiChar &&
                   gameBoard[2][2] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        }

            //another win
        else if (gameBoard[0][2] == (int) aiChar && gameBoard[1][1] == (int) aiChar &&
                 gameBoard[2][0] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        } else if (gameBoard[0][0] == (int) aiChar && gameBoard[1][1] == (int) aiChar &&
                   gameBoard[2][2] == (int) aiChar) {
            *winMsg = "Ai is the win";
            return true;
        }

        //tie (doesn't work)
        else
        {
            int charCount = 0;

            for (int i = 0; i < 3; i++){
                for (int j = 0; j < 3; j++){
                    if (gameBoard[i][j] == playerChar || gameBoard[i][j] == aiChar){
                        charCount++;
                    }
                    else if (charCount == 9){
                        *winMsg = "Draw";
                        return true;
                    }
                }

            }
        }

    }
};
//end of the AI Class

//begin of the  main method
int main()
{
    //local variables
    int aiGO = 0;
    int playerGo = 1;

    char aiChar = 'O';
    char playerChar = 'X';

    bool checkWin = false;
    string winMsg = "";
    int rounds = 0;
    int playerCount = 0;

    board gameBoard = board();
    player player1 = player();
    ai ai1 = ai();



    //display game board
    gameBoard.newDisplayBoard();

    //next line
    cout << endl;

    //who go first
    string input;
    while (true)
    {
        //ask the question
        cout << "Want to go first or second?:";
        cin >> input;

        //if it that break ou of the loop
        if (input == "first" || input == "second")
        {
            break;
        }


        //clear up the memory
        cin.clear();  //clean the input area
        cin.ignore(1000, '\n'); //discards 1000 char or until sees a new line

        //ask the use again if not right
        cout << endl;
        cout << "Please enter first or second. \n" << endl;
        cout << endl;
    }

    if (input == "second")
    {
        //pick a corner or the center
        ai1.aiWentFirst(gameBoard.newBoardArray, &aiChar);

        cout << endl;
        //update the board
        gameBoard.updateBoard();

        rounds++;
        aiGO = 0;
        cout << endl;
    }

    cout << endl;

    //loop unitl a ai wins
    while (!checkWin)
    {
        if ((winMsg.empty() && input == "first") || aiGO == 0) {
            //check win
            ai1.checkWin(gameBoard.newBoardArray, playerChar, aiChar, &winMsg, rounds);

            if (winMsg.empty()) {
                //player move (no validation)
                cout << "Where do you want to (1 - 9):";
                int userInput;
                cin >> userInput;

                //play move where player says
                player1.playMove(userInput, gameBoard.newBoardArray, &playerChar, &playerCount);

                //ai
                //check to see if  the user take the center
                //it will neither trap the player or see if it can
                if (userInput == 5) {
                    ai1.takeEight(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeThree(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeTwo(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeFour(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeSeven(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    //can win
                    ai1.canWin(gameBoard.newBoardArray, playerChar, &aiChar, &aiGO);

                    //block
                    ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                    //weight moves
                    ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);

                }

                //for the rest of userInputs
                //it will tarp the play or see if it can win
                //these conditions make it work with 3 xs in the corners and make the ai always win or end up in a tie
                else if (userInput == 6){
                    //trap the player or see if you can win
                    ai1.takeThree(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeNine(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeFour(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeOne(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    ai1.takeNine(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                    //can win
                    ai1.canWin(gameBoard.newBoardArray, playerChar, &aiChar, &aiGO);

                    //block
                    ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                    //weight moves
                    ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);


                }

                //if is the first round and center isn't take then take the center
                else if (rounds == 0) {
                ai1.moveCenter(gameBoard.newBoardArray, playerChar, &aiChar, &aiGO);

                //block
                ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);


                } else if (rounds >= 1) {
                    //for the rest of userInputs
                    //it will tarp the play or see if it can win
                    //these conditions make it work with 3 xs in the corners and make the ai always win or end up in a tie
                    if (userInput == 1) {
                        //trap the player or see if you can win
                        ai1.takeSeven(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeOne(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeEight(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeFour(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        //can win
                        ai1.canWin(gameBoard.newBoardArray, playerChar, &aiChar, &aiGO);

                        //block
                        ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                        //weight moves
                        ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);

                    } else if (userInput == 2) {
                        //trap the player or see if you can win
                        ai1.takeThree(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeOne(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeEight(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeNine(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        //block
                        ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                        //weight moves
                        ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);

                    } else if (userInput == 4) {
                        //trap the player or see if you can win
                        ai1.takeOne(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeSeven(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeSix(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        //can win
                        ai1.canWin(gameBoard.newBoardArray, playerChar, &aiChar, &aiGO);

                        //block
                        ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                        //weight moves
                        ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);

                    }


                    else if (userInput == 7) {
                        //trap the player or see if you can win
                        ai1.takeOne(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        //block
                        ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                        //weight moves
                        ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);
                    }

                    else if (userInput == 8) {
                        //trap the player or see if you can win
                        ai1.takeSeven(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeNine(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeTwo(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        ai1.takeThree(gameBoard.newBoardArray, &aiChar, &aiGO, playerChar);

                        //block
                        ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                        //weight move
                        ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);
                    }




                    } else {
                        //see if you can win
                        ai1.canWin(gameBoard.newBoardArray, playerChar, &aiChar, &aiGO);


                        //weight moves
                        ai1.weightMoves(gameBoard.newBoardArray, &aiChar, playerChar, &aiGO);

                        //block
                        ai1.block(gameBoard.newBoardArray, &playerChar, &aiChar, &aiGO);

                        //random (by use weight)
                    }


                }

                //update board
                cout << endl;
                gameBoard.updateBoard();

                rounds++;
                aiGO = 0;
                cout << endl;
            }

            //prints a win msg if ai has win
            if (!winMsg.empty()) {
                cout << winMsg;
                checkWin = true;
            }

    }

    return 0;
}