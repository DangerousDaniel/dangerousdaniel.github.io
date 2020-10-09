/*
 * Name: Daniel Cox
 * Date: Oct 22 - Oct 25, 2019
 * Title: Quiz Builder 1.0
 * Type: Android
 */

package com.example.quizbuilder10;

//imports
import androidx.appcompat.app.AppCompatActivity;
import android.content.Context;

import android.content.Intent;
import android.content.res.AssetManager;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.*;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.*;

public class ActivityTwo extends AppCompatActivity {

    //Class Variables
    //Text Views
    TextView defTextView;

    //buttons
    Button buttonTerm1;
    Button buttonTerm2;
    Button buttonTerm3;
    Button buttonTerm4;

    Button nextButton;


    //Array List
    ArrayList<String> QuestionList = new ArrayList<String>();
    public static ArrayList<String> AnswerList = new ArrayList<String>();
    ArrayList<Button> buttonList = new ArrayList<Button>();

    //Hash
    HashMapBothWays<String, String> hashAnswers = new HashMapBothWays<>();

    //Misc
    String currentTerm;
    static int count = 0;
    public static double mark = 0.0;

    //when create the screen
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);

        //connect up the weights
        defTextView = findViewById(R.id.defTextView);
        buttonTerm1 = findViewById(R.id.buttonTerm1);
        buttonTerm2 = findViewById(R.id.buttonTerm2);
        buttonTerm3 = findViewById(R.id.buttonTerm3);
        buttonTerm4 = findViewById(R.id.buttonTerm4);
        nextButton = findViewById(R.id.nextButton);

        //add buttons to the button list
        buttonList.add(buttonTerm1);
        buttonList.add(buttonTerm2);
        buttonList.add(buttonTerm3);
        buttonList.add(buttonTerm4);

        //open file
        InputStream is = null;
        AssetManager am = getApplicationContext().getAssets();

        try {
            is = am.open("textQuestion.txt"); //open the file

        }
        //let the user know if can't open or it general error
        catch (IOException e) {
            System.out.println("Can't open file (Error)");
        } catch (Exception e) {
            System.out.println("Error");
        }

        //read file
        BufferedReader br = new BufferedReader(new InputStreamReader(is));
        String s;

        try {
            //read line by line
            while ((s = br.readLine()) != null) {
                //split the line
                int count = 0;
                String[] TempStr = new String[2];
                String[] arrOFStr = s.split(",");

                for (String a : arrOFStr) {
                    TempStr[count] = a;
                    count++;
                }
                //store them in list and hash
                QuestionList.add(TempStr[0]);
                AnswerList.add(TempStr[1]);
                hashAnswers.add(TempStr[0], TempStr[1]);
            }
            //close the file
            is.close();

        }
        //let the user know if can't read or it general error
        catch (IOException e) {
            System.out.println("Can't read file (Error)");
        } catch (Exception e) {
            System.out.println("Error");
        }

        //display the current definition
        defTextView.setText(QuestionList.get(0));

        //shuffle buttons
        Collections.shuffle(buttonList);

        //show the button
        for (int i = 0; i < 4; i++) {
            buttonList.get(i).setText(AnswerList.get(i));
            buttonList.get(i).setBackgroundColor(Color.LTGRAY);

        }

        //store a string array for next button msg
        final String[] nextButtonMsg = new String[3];
        nextButtonMsg[0] = "Confirm";
        nextButtonMsg[1] = "Next Question";
        nextButtonMsg[2] = "Finish";
        nextButton.setText(nextButtonMsg[0]);


        //when never you click a button, it set the current term to what you clicked
        //Yellow = what you clicked
        buttonTerm1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                currentTerm = buttonTerm1.getText().toString();

                for (int i = 0; i < 4; i++) {
                    buttonList.get(i).setBackgroundColor(Color.LTGRAY);
                }

                buttonTerm1.setBackgroundColor(Color.YELLOW);
            }
        });

        buttonTerm2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                currentTerm = buttonTerm2.getText().toString();

                for (int i = 0; i < 4; i++) {
                    buttonList.get(i).setBackgroundColor(Color.LTGRAY);
                }

                buttonTerm2.setBackgroundColor(Color.YELLOW);
            }
        });

        buttonTerm3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                currentTerm = buttonTerm3.getText().toString();

                for (int i = 0; i < 4; i++) {
                    buttonList.get(i).setBackgroundColor(Color.LTGRAY);
                }

                buttonTerm3.setBackgroundColor(Color.YELLOW);
            }
        });

        buttonTerm4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                currentTerm = buttonTerm4.getText().toString();

                for (int i = 0; i < 4; i++) {
                    buttonList.get(i).setBackgroundColor(Color.LTGRAY);
                }

                buttonTerm4.setBackgroundColor(Color.YELLOW);
            }
        });

        //when you click the next button
        nextButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                //as along the text on the next equals "confirm"
                if (nextButton.getText().equals(nextButtonMsg[0]))
                {

                    if (QuestionList.size() == 0){
                        //change the next button to "Confirm"
                        nextButton.setText(nextButtonMsg[2]);
                    }else
                    {
                        //change the next button to "Confirm"
                        nextButton.setText(nextButtonMsg[1]);
                    }



                    String Answer = hashAnswers.getForward(defTextView.getText().toString());
                    System.out.println(Answer);

                    //check to see if it right
                    if (currentTerm.equals(Answer))
                    {
                        for (int l = 0; l < 4; l++)
                        {
                            //show what one is right
                            //Green = right
                            if (Answer == buttonList.get(l).getText())
                            {
                                buttonList.get(l).setBackgroundColor(Color.GREEN);
                            }
                        }

                        //let the user know that you got it right
                        Context context = getApplicationContext();
                        int duration = Toast.LENGTH_LONG;
                        Toast toast = Toast.makeText(context, "right", duration);
                        toast.show();

                        //give them a mark
                        mark = mark + 1;
                    }
                    //check to see if it wrong
                    else
                    {
                        for (int l = 0; l < 4; l++)
                        {
                            //show what one are right and wrong
                            //Green = right
                            //Red = wrong
                            if (Answer == buttonList.get(l).getText())
                            {
                                buttonList.get(l).setBackgroundColor(Color.GREEN);
                            }
                            else
                            {
                                buttonList.get(l).setBackgroundColor(Color.RED);
                            }

                        }

                        Context context = getApplicationContext();
                        int duration = Toast.LENGTH_LONG;
                        Toast toast = Toast.makeText(context, "incorrect", duration);
                        toast.show();

                    }

                }
                else
                {

                    if (count == AnswerList.size() - 1)
                    {
                        Intent i = new Intent("ActivityThree");
                        startActivity(i);
                    }
                    else
                    {
                        count = count + 1;
                        QuestionList.remove(0);

                        //change the next button to "Confirm"
                        nextButton.setText(nextButtonMsg[0]);

                        //make the buttons gary
                        for (int i = 0; i < 4; i++)
                        {
                            buttonList.get(i).setBackgroundColor(Color.LTGRAY);
                        }

                        //make sure there is still questions
                        if (!QuestionList.isEmpty()) {
                            defTextView.setText(QuestionList.get(0));
                        }

                        //check to make one of the answers is the answer
//                        String Answer = hashAnswers.getForward(defTextView.getText().toString());
//                        buttonList.get(0).setText(Answer);

                        //can't have the answer twice


                        //shuffle buttons
                        Collections.shuffle(buttonList);

                    }
                }
            }
        });

    }
}
