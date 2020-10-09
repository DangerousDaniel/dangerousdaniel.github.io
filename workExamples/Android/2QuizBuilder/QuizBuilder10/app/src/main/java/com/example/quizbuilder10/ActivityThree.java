/*
 * Name: Daniel Cox
 * Date: Oct 22 - Oct 25, 2019
 * Title: Quiz Builder 1.0
 * Type: Android
 */

package com.example.quizbuilder10;

//Imports
import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class ActivityThree extends AppCompatActivity {

    //Class Variables
    TextView yourNameTextView;
    TextView markTextView;

    Button tryAgainButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main3);


        //connect up the widgets
        yourNameTextView = findViewById(R.id.yourNameTextView);
        markTextView = findViewById(R.id.markTextView);
        tryAgainButton = findViewById(R.id.tryAgainQuizButton);

        //set the name
        yourNameTextView.setText(MainActivity.name);
        System.out.println(MainActivity.name);

        //set the mark
        double total = (ActivityTwo.mark / ActivityTwo.AnswerList.size()) * 100;
        String totalStr = total + "%";
        markTextView.setText(totalStr);

//        when you click play again
        tryAgainButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                //reset the mark
                ActivityTwo.mark = 0.0;

                //run the quiz screens
                Intent i = new Intent("ActivityTwo");//create intent object
                startActivity(i);
            }
        });

    }
}
