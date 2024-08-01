from flask import Flask, request, render_template

import pickle

import numpy as np

#load model
model_diabetes = pickle.load(open('model_diabetes.pkl', 'rb'))
preprocessor_diabetes = pickle.load(open('preprocessor_diabetes.pkl', 'rb'))

model_heart = pickle.load(open('model_heart.pkl', 'rb'))
preprocessor_heart = pickle.load(open('preprocessor_heart.pkl', 'rb'))

app = Flask(__name__)


#diabetes model
@app.route("/diabetes")
def process_process():
    gender_value = float(request.args.get('gender_value'))
    age_value = float(request.args.get('age_value'))
    hypertension_value = float(request.args.get('hypertension_value'))
    heart_disease_value = float(request.args.get('heart_disease_value'))
    bmi_value = float(request.args.get('bmi_value'))
    HbA1c_level_value = float(request.args.get('HbA1c_level_value'))
    blood_glucose_level_value = float(request.args.get('blood_glucose_level_value'))
    smoking_history = request.args.get('smoking_history')
    features = np.array([[gender_value,age_value,hypertension_value,heart_disease_value,smoking_history,bmi_value,HbA1c_level_value,blood_glucose_level_value]],
                            dtype=object)
    transformed_features = preprocessor_diabetes.transform(features)
    result = model_diabetes.predict(transformed_features).reshape(1, -1)
    return str(result[0])

#The following code is the code for heart model.......
@app.route('/heart')
def process_heart():
    age= float(request.args.get('age'))
    sex= float(request.args.get('sex'))
    chest_pain_type= float(request.args.get('chest_pain_type'))
    resting_bp_s = float(request.args.get('resting_bp_s'))
    cholesterol	 = float(request.args.get('cholesterol'))
    fasting_blood_sugar	 = float(request.args.get('fasting_blood_sugar'))
    resting_ecg	= float(request.args.get('resting_ecg'))
    max_heart_rate = float(request.args.get('max_heart_rate'))
    exercise_angina= float(request.args.get('exercise_angina'))
    oldpeak= float(request.args.get('oldpeak'))
    ST_slope = int(request.args.get('ST_slope'))
    features_df = np.array([[age, sex, chest_pain_type, resting_bp_s,cholesterol,fasting_blood_sugar,resting_ecg,max_heart_rate,exercise_angina,oldpeak,ST_slope]])

    # Transform the features using the preprocessor
    transformed_features =preprocessor_heart.transform(features_df)

    # Make the prediction
    predicted_yield = model_heart.predict(transformed_features).reshape(1, -1)
    return str(predicted_yield[0][0])
    

    
if __name__ == '__main__':
    app.run(debug=True)
